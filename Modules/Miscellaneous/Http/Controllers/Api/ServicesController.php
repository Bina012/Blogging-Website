<?php

namespace Modules\Miscellaneous\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Api\ApiBaseController;
use App\Repository\ImageRepository;
use Modules\Miscellaneous\Repository\Services\ServicesRepository;


class ServicesController extends ApiBaseController
{
    private  $servicesRepository;
    private $imageRepository;
    public function __construct(ServicesRepository $servicesRepository, ImageRepository $imageRepository)
    {
        $this->servicesRepository = $servicesRepository;
        $this->imageRepository = $imageRepository;
    }

    public function getServices(){
        try{
            $services = $this->servicesRepository->getAll();
            foreach($services as $service){
                $service->image=url('uploads/images/service/'.$service->image);
            }
            $data=['services'=>$services];
            return $this->successData('Successfully Fetched',$data,200);

        }catch(\Exception $e){
            return $this->errordata('Unable to fetch services due to some server error!',$e->getMessage(),500);
        }
    }
}
