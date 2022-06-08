<?php

namespace Modules\Miscellaneous\Repository\Tag;

use Modules\Miscellaneous\Entities\Tag;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TagRepository extends BaseRepository
{

    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */

    public function first()
    {
        return $this->model->first();   
    }

    public function all()
    {
        return $this->model->all();
    }

    public function getLatest()
    {
        return $this->model->latest()->get();
        // return $this->model->orderBy('created_at','desc')->get();
    }

    public function create(array $attributes): Model
    {
        try {
            DB::beginTransaction();
            $data = $this->model->create($attributes);
            DB::commit();
            return $data;
        } catch (\Exception$e) {
            DB::rollback();
            echo $e->getMessage();
        }
    }

    /**
     * @return success
     */
    public function update(array $attributes, $id): Model
    {
        try {
            DB::beginTransaction();
            $data = $this->model->find($id);
            $return_data = $data->update($attributes);
            DB::commit();
            return $data;
        } catch (\Exception$e) {
            DB::rollback();
            echo $e->getMessage();
        }
    }
    public function findById($id)
    {
        return $this->model->findOrFail($id);     
 
   }
   public function getBlog($slug)
   { 
       return $this->model->with('getBlog')->where('slug',$slug)->get(); 
   }
  
  
}



