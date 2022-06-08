<?php

namespace Modules\Miscellaneous\Repository\Partner;

use Modules\Miscellaneous\Entities\Partner;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PartnerRepository extends BaseRepository
{

    public function __construct(Partner $model)
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
}
