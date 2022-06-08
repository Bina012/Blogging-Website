<?php

namespace Modules\Miscellaneous\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Miscellaneous\Repository\blog\BlogCategoryRepository;
use Modules\Miscellaneous\Repository\Blog\BlogSlugRepository;
use App\Http\Controllers\Api\ApiBaseController;


class BlogCategoryController extends ApiBaseController
{
    private $blogcategoryRepository;
    private $blogSlugRepository;
    private $blogRepository;

    public function __construct(BlogCategoryRepository $blogcategoryRepository, BlogSlugRepository $blogSlugRepository)
    {
        $this->blogcategoryRepository = $blogcategoryRepository;
        $this->blogSlugRepository = $blogSlugRepository;
        
    }
    public function getAllBlogCategory()
    {
        try{
            
            $blogs = $this->blogcategoryRepository->all();
            foreach($blogs as $blog){
                $blog->image=url('uploads/images/blogcategory/'.$blog->image);
            }
            $data=['blogs'=>$blogs];
            return $this->successData('Successfully Fetched',$data,200);

        }catch(\Exception $e){
            return $this->errordata('Unable to fetch categories due to some server error!',$e->getMessage(),500);
        }

    }
    public function getSingleBlogCategory($slug)
    {
        try{
            $blog = $this->blogcategoryRepository->findBySlug($slug);
            $blog->image = url('uploads/images/blogcategory/'.$blog->image);
            $data=['blog'=>$blog];
            return $this->successData('Successfully Fetched',$data,200);

        }catch(\Exception $e){
            return $this->errordata('Unable to fetch blog categories due to some server error!',$e->getMessage(),500);
        }

    }
    public function getBlogWithCategory($slug)
    {
        try{ 
            $categorys = $this->blogcategoryRepository->getBlog($slug);
            foreach($categorys as $category){
                $category->image = url('uploads/images/blogcategory/'.$category->image);

                foreach($category->getBlog as $blog)
                {
                    $blog->image = url('uploads/images/blog/'.$blog->image);
                }
                $data=['category'=>$category];
                return $this->successData('Successfully Fetched',$data,200);
            }
            }catch(\Exception $e){
                return $this->errordata('Unable to fetch categories due to some server error!',$e->getMessage(),500);
            }
    }
}
