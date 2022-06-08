<?php
namespace Modules\Enquiry\Repository;

use Modules\Enquiry\Entities\Enquiry;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class EnquiryRepository extends BaseRepository
{
    public function __construct(Enquiry $model)
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
        return $this->model->all();
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
    public function updateMail()
    {
        return $this->model->where('status',1)->get();
    }

}



?>