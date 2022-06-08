<?php

namespace Modules\Miscellaneous\Repository\Banner;

use Modules\Miscellaneous\Entities\Banner;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BannerRepository extends BaseRepository
{

    public function __construct(Banner $model)
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

    public function find($id)
    {
        return $this->model->find($id);
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
