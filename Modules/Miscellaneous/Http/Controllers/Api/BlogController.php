<?php

namespace Modules\Miscellaneous\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Miscellaneous\Http\Requests\BlogValidate;
use Modules\Miscellaneous\Repository\Blog\BlogRepository;
use Modules\Miscellaneous\Repository\Blog\BlogSlugRepository;
use App\Repository\ImageRepository;
use App\Http\Controllers\Api\ApiBaseController;
use Modules\Miscellaneous\Entities\BlogCount;
use Modules\Miscellaneous\Entities\BlogTag;

class BlogController extends ApiBaseController
{
    private $blogRepository;
    private $blogSlugRepository;

    public function __construct(BlogRepository $blogRepository, BlogSlugRepository $blogSlugRepository, ImageRepository $imageRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->blogSlugRepository = $blogSlugRepository;
        $this->imageRepository = $imageRepository;
    }

    public function getAllBlog()
    {
        try{
            $blogs = $this->blogRepository->getAll();
            foreach($blogs as $blog){
                $blog->image=url('uploads/images/blog/'.$blog->image);
            }
            $data=['blogs'=>$blogs];
            return $this->successData('Successfully Fetched',$data,200);

        }catch(\Exception $e){
            return $this->errordata('Unable to fetch blogs due to some server error!',$e->getMessage(),500);
        }

    }

    public function getSingle($slug)
    {
        try{
            $blog = $this->blogRepository->findBySlug($slug);
            
            $blogUpdate = $this->blogRepository->updateCount($slug);
            $blogCount = new BlogCount();
            $blogCount['blog_id'] = $blogUpdate->id;
            $blogCount->save();
            $blog->image = url('uploads/images/blog/'.$blog->image);
            $data=['blog'=>$blog];
            return $this->successData('Successfully Fetched',$data,200);
        }catch(\Exception $e){
            return $this->errordata('Unable to fetch blogs due to some server error!',$e->getMessage(),500);
        }
    }
    public function getFeature()
    {
        try{
            $blogs = $this->blogRepository->getFeature();
            foreach($blogs as $blog){
                $blog->image=url('uploads/images/blog/'.$blog->image);
            }
            $data=['blogs'=>$blogs];
            return $this->successData('Successfully Fetched',$data,200);

        }catch(\Exception $e){
            return $this->errordata('Unable to fetch blogs due to some server error!',$e->getMessage(),500);
        }
    }
    public function getLatest()
    {
        try{
            $blogs = $this->blogRepository->getLatest();
            foreach($blogs as $blog){
                $blog->image=url('uploads/images/blog/'.$blog->image);
            }
            $data=['blogs'=>$blogs];
            return $this->successData('Successfully Fetched',$data,200);

        }catch(\Exception $e){
            return $this->errordata('Unable to fetch blogs due to some server error!',$e->getMessage(),500);
        }
    }
    public function getSimilarBlog($slug)
    {
        try{
            
            $similarBlogs = $this->blogRepository->SimilarBlog($slug);
            foreach($similarBlogs as $similarBlog){
                $similarBlog->image = url('uploads/images/blog/'.$similarBlog->image);
            }
            $data=['similarBlogs'=>$similarBlogs];
            return $this->successData('Successfully Fetched',$data,200);
        
            }catch(\Exception $e){
                return $this->errordata('Unable to fetch categories due to some server error!',$e->getMessage(),500);
        }
    
    }
    public function getBlogByTag($id)
    {
        try{
            $blogs = $this->blogRepository->BlogByTag($id);
            foreach($blogs->blogtags as $blog)
            {
                //here second blog is name of the relation
                $blog->blog->image=url('uploads/images/blog/'.$blog->blog->image);
            }
            $data=['blogs'=>$blogs];
            return $this->successData('Successfully Fetched',$data,200);
        }catch(\Exception $e){
            return $this->errordata('Unable to fetch blog due to some server error!',$e->getMessage(),500);
    }
    }
}
