<?php

namespace Modules\Miscellaneous\Http\Controllers\Backend\Blog;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\ImageRepository;
use Modules\Miscellaneous\Repository\Blog\BlogCategoryRepository;
use Modules\Miscellaneous\Repository\Blog\BlogSlugRepository;
use Modules\Miscellaneous\Http\Requests\BlogCategoryValidate;
use Modules\Miscellaneous\Http\Requests\BlogImageCategoryValidate;


class BlogCategoryController extends Controller
{

    private $blogcategoryRepository;
    private $blogSlugRepository;
    private $imageRepository;

public function __construct(BlogCategoryRepository $blogcategoryRepository, BlogSlugRepository $blogSlugRepository, ImageRepository $imageRepository)
    {
        $this->blogcategoryRepository = $blogcategoryRepository;
        $this->blogSlugRepository = $blogSlugRepository;
        $this->imageRepository = $imageRepository;
    }
    
    public function index()
    {
        try {
            $blogCategorys = $this->blogcategoryRepository->getLatest();   
            return view('miscellaneous::backend.blogcategory.view-blogcategory', compact('blogCategorys'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function add()
    { 
        try {
            
            $blogCategorys = $this->blogcategoryRepository->getLatest();
            return view('miscellaneous::backend.blogcategory.add-blogcategory', compact('blogCategorys'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
       
    }

   
    
    /**
     * Add Course Category rendering page
     */

    
    public function store(BlogCategoryValidate $request)
    {
        try {
            
            if ($request->hasFile('image')) {
                $validatedData = $request->validate([
                    'image' => 'required',
                ]);
            }
            $slug = $this->blogSlugRepository->createSlug($request->category_name);
            $image = $this->imageRepository->saveImage($request, 'blogcategory');
            
            $data = [
                'category_name' => $request->category_name,
                'image' => $image,
                'image_alternative' => $request->image_alternative,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'slug' => $slug,
            ];
            $this->blogcategoryRepository->create($data);

            $notification = array(
                'message' => 'Blog category Added Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('blogcategory.index')->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function view($id)
    {
        try {
            $blogCategorys = $this->blogcategoryRepository->findById($id);
            return view('miscellaneous::backend.blogcategory.view-single-blogcategory', compact('blogCategorys'));
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }
    public function edit($id)
    {
        try {
            
            // $blogCategorys = $this->blogCategoryRepository->getLatest();
            $blog = $this->blogcategoryRepository->findById($id);
            // $blog = $this->blogCategoryRepository->findById($id);
            
             return view('miscellaneous::backend.blogcategory.edit-blogcategory', compact('blog'));
        } catch (\Exception $e) {

            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            dd('edit');
            return redirect()->Back()->with($notification);
        }
    }

    /**
     * Edit Course Category rendering page
     */
    
    public function update(BlogImageCategoryValidate $request)

    {
        try {
            
            $slug = $this->blogSlugRepository->createSlug($request->category_name);
           
            $data = [
                'category_name' => $request->category_name,
                'image_alternative' => $request->image_alternative,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'slug' => $slug,
            ];
            // dd($request);
 
            /**
             * if image is not empty then update image
             */
            if ($request->hasFile('image')) {
               
                $blog = $this->blogcategoryRepository->findById($request->id);
                
                if (isset($blog->image)) {
                    $this->imageRepository->removeImage($blog, 'blogcategory');
                }
                $data['image'] = $this->imageRepository->saveImage($request, 'blogcategory');
            }
            /**
             * update data
             */
            
            $this->blogcategoryRepository->update($data, $request->id);
            /**
             * notification & redirect
             */
            $notification = array(
                'message' => 'Blog category Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('blogcategory.index')->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            
        }
    }

    /**
     * Delete Course Category
     */
    public function delete(Request $request)
    {
        try {
            $blog = $this->blogcategoryRepository->findById($request->id);
            if (isset($blog->image)) {
                $this->imageRepository->removeImage($blog, 'blogcategory');
            }
            $this->blogcategoryRepository->delete($request->id);
            $notification = array(
                'message' => 'Blog category Deleted Successfully',
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
}
