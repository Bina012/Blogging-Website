<?php

namespace Modules\Miscellaneous\Http\Controllers\Backend\Blog;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Miscellaneous\Http\Requests\BlogValidate;
use Modules\Miscellaneous\Repository\Blog\BlogRepository;
use Modules\Miscellaneous\Repository\Blog\BlogSlugRepository;
use App\Repository\ImageRepository;
use Modules\Miscellaneous\Repository\Blog\BlogCategoryRepository;
use Modules\Miscellaneous\Entities\Tag;
use Modules\Miscellaneous\Entities\BlogTag;
use Modules\Miscellaneous\Entities\Blog;
use Modules\Miscellaneous\Repository\Tag\TagRepository;
use Modules\Enquiry\Entities\Enquiry;
use Illuminate\Support\Facades\Mail;
use Modules\Enquiry\Jobs\SendBlogEmail;



class BlogController extends Controller
{
    private $blogRepository;
    private $blogSlugRepository;

    public function __construct(BlogRepository $blogRepository, BlogSlugRepository $blogSlugRepository, ImageRepository $imageRepository, BlogCategoryRepository $blogCategoryRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->blogSlugRepository = $blogSlugRepository;
        $this->imageRepository = $imageRepository;
        $this->blogCategoryRepository = $blogCategoryRepository;
    }

    /**
     * Rendering the add page
     */
    public function add()
    {
        
        $blogCategorys = $this->blogCategoryRepository->getLatest();
        $tags = Tag::all();
        // dd($blogCategorys->all());
        return view('miscellaneous::backend.blog.add-blog', compact('blogCategorys','tags'));
    }
    /**
     * Store the blog
     */
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('image')) {
                $validatedData = $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg|max:5000',
                ]);
            }

            $slug = $this->blogSlugRepository->createSlug($request->blog_title);
            $image = $this->imageRepository->saveImage($request, 'blog');
            $data = [
                'blog_id' => $request->blog_category,
                'blog_title' => $request->blog_title,
                'cat_id'=> $request->blog_category,
                'image' => $image,
                'image_alternative' => $request->image_alternative,
                'blog_description' => $request->blog_description,
                'blog_slug' => $slug,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
            ];
            $blog = $this->blogRepository->create($data);
            
            foreach($request->tags as $tag)
            {
                $newTag = new BlogTag();
                $newTag['tag_id'] = $tag;
                $newTag['blog_id'] = $blog->id;
                $newTag->save();
            }
            
            $enquiry = Enquiry::where('status',1)->get();
            foreach($enquiry as $enq)
            {
                $email = $enq->email;
                dispatch(new SendBlogEmail($email));
            }
            
            $notification = array(
                'message' => 'Blog Added Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('blog.index')->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }

    /**
     * Rendering the index page
     */
    public function index()
    {
        try {
            
            // $blogs = $this->blogRepository->getAll();
            $blogs = $this->blogRepository->belongsTo();
            return view('miscellaneous::backend.blog.view-blog', compact('blogs'));
        } catch (\Exception $e) {

            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }

    /**
     * Rendering the edit page
     */
    public function edit($id)
    {
        try {
            $tags = Tag::all();
            $oldTags = BlogTag::where('blog_id',$id)->get();
            $selectedTags= array();
            foreach($oldTags as $oldTag)
            {
                $selectedTags[] = $oldTag['tag_id']; 
            }
            $blogCategorys = $this->blogCategoryRepository->getLatest();
            $blog = $this->blogRepository->findById($id);
            return view('miscellaneous::backend.blog.edit-blog', compact('blog', 'blogCategorys','tags','selectedTags'));
        } catch (\Exception $e) {

            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }

    /**
     * Update the blog
     */
    public function update(BlogValidate $request)
    {
        try {
            $slug = $this->blogSlugRepository->createSlug($request->blog_title);
            
            
            $data = [
                'blog_id' => $request->blog_category,
                'blog_title' => $request->blog_title,
                'image_alternative' => $request->image_alternative,
                'blog_description' => $request->blog_description,
                'blog_slug' => $slug,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
            ];

            /**
             * if image is not empty then update image
             */
            if ($request->hasFile('image')) {
                $validatedData = $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg|max:5000',
                ]);
                $blog = $this->blogRepository->findById($request->id);

                if (isset($blog->image)) {
                    $this->imageRepository->removeImage($blog, 'blog');
                }
                $data["image"] = $this->imageRepository->saveImage($request, 'blog');
            }
        
            $this->blogRepository->update($data, $request->id);

            
            $blogTags = BlogTag::where('blog_id',$request->id)->get();
            
            foreach($blogTags as $blogTag)
            {
                $blogTag->delete();
            }
           
            foreach($request->tags as $tag)
            {
                BlogTag::create([
                    'blog_id' => $request->id,
                    'tag_id' => $tag
                ]);
            }
            $notification = array(
                'message' => 'Blog Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('blog.index')->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            
            return redirect()->Back()->with($notification);
        }
    }

    /**
     * Delete the blog
     */
    public function delete(Request $request)
    {
        try {
            $blog = $this->blogRepository->findById($request->id);
            
            if (isset($blog->image)) {
                $this->imageRepository->removeImage($blog, 'blog');
            }
            $data = $this->blogRepository->delete($request->id);
            
            //deleting tag
            $blogTags = BlogTag::where('blog_id',$blog->id)->get();
            foreach($blogTags as $blogTag)
            {
                $blogTag->delete();
            }
            //end deleting tag
            $notification = array(
                'message' => 'Blog Deleted Successfully',
                'alert-type' => 'success',
            );
            return redirect()->Back()->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }

    /**
     * Change the status of the blog
     */
    public function blogStatus(Request $request)
    {
        try {
            $blog = $this->blogRepository->findById($request->id);
            $status = $blog->blog_status == 1 ? 0 : 1;
            $this->blogRepository->update(['blog_status' => $status], $request->id);
            $notification = array(
                'message' => 'Blog Status Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->Back()->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }
    /**
     * Change the feature of the blog
     */
    public function blogFeature(Request $request)
    {
        try {

            $blog = $this->blogRepository->findById($request->id);
            $feature = $blog->blog_feature == 0 ? 1 : 0;
            $this->blogRepository->update(['blog_feature' => $feature], $request->id);
            $notification = array(
                'message' => 'Blog Feature Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->Back()->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }

    /**
     * view the blog details
     */
    public function view($id)
    {
        try {
            $blog = Blog::where('id',$id)->with('blogTags')->first();
            // dd($blog);
            return view('miscellaneous::backend.blog.view-single-blog', compact('blog'));
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }
}
