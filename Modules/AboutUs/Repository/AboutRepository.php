<?php   

namespace Modules\AboutUs\Repository;


use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Collection;
use App\Repository\BaseRepository;
use Modules\AboutUs\Entities\About;


class AboutRepository extends BaseRepository{

    protected $model;
    public function __construct(About $model)
    {
        parent::__construct($model);
    }

    public function create(array $attributes){
        try {

            $this->model->create($attributes);
            return true;
        } catch (\Exception $e) {
             dd($e->getMessage());
        }
    }

    public function update(array $attributes,$id){
        try {
            $data=$this->find($id);
           $data->update($attributes);
           return true;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function getOne(){
        return $this->model->first();
    }
}