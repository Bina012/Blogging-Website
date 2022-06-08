<?php

namespace Modules\Miscellaneous\Repository\Blog;

use Modules\Miscellaneous\Entities\Blog;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Miscellaneous\Entities\Tag;
use Modules\Miscellaneous\Entities\BlogTag;

class BlogRepository extends BaseRepository
{

    public function __construct(Blog $model)
    {
        parent::__construct($model);
    }

    public function first()
    {
        return $this->model->first();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getAll()
    {
        return $this->model->with('blogTags.tag')->get();
    }

    public function belongsTo(){
        return $this->model->with('blogCategory')->orderBy('created_at','desc')->get();
    }

    public function create(array $attributes): Model
    {
        try {
            DB::beginTransaction();
            $data = $this->model->create($attributes);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
        }
    }

    public function update(array $attributes, $id): Model
    {
        try {
            DB::beginTransaction();
            $data = $this->model->find($id);
            $return_data = $data->update($attributes);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
        }
    }
    public function getFeature()
    {
        $data = DB::table('blogs')
        ->join('b_log_categories','blogs.cat_id','=','b_log_categories.id')
        ->where('blog_feature',1)
        ->select('blogs.*', 'b_log_categories.category_name')->get();
        return $data;
    }
    public function getLatest()
    {
        $data = DB::table('blogs')
        ->join('b_log_categories','blogs.cat_id','=','b_log_categories.id')
        ->select('blogs.*', 'b_log_categories.category_name')
        ->orderBy('blogs.id','DESC')->get();
        return($data);
        
    }
    public function findBySlug($slug)
    {
        //USING QUERY BUILDER

        // $data = DB::table('blogs')
        // ->join('b_log_categories','blogs.cat_id','=','b_log_categories.id')
        // ->select('blogs.*', 'b_log_categories.category_name')->where('blog_slug',$slug)->first();  
        // return($data);

        return $this->model->where('blog_slug',$slug)->with('blogCategory')->with('blogTags.tag')->first();
    }
    public function SimilarBlog($slug)
    { 
        $blog = Blog::where('blog_slug',$slug)->first();
        $related_blogs = $this->model->where('cat_id',$blog->cat_id)->where('id','!=',$blog->id)->with('blogCategory')->limit(6)->get();
        return $related_blogs;
    }

    public function updateCount($slug)
    {
        $blog = Blog::where('blog_slug',$slug)->first();
        $input['count'] = $blog->count+1;
        $blog->fill($input);
        $blog->save();
        return $blog;
    }

    public function getTag($id)
    {
        $data = DB::table('blogs')
        ->join('blog_tags','blogs.id','=','blog_tags.blog_id')->get();
        // ->select('blogs.*', 'b_log_categories.category_name')
        // ->orderBy('blogs.id','DESC')->get();
        return($data);
        
    }
    public function BlogByTag($id)
    {
        $related_blog = Tag::where('id',$id)->with('blogtags.blog')->first();
        return $related_blog;

    }  
}
