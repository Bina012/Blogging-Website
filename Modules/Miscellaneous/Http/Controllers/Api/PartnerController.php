<?php

namespace Modules\Miscellaneous\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Api\ApiBaseController;
use Modules\Miscellaneous\Repository\Partner\PartnerRepository;
use App\Repository\ImageRepository;


class PartnerController extends ApiBaseController
{

    private $partnerRepository;
    private $imageRepository;

    public function __construct(PartnerRepository $partnerRepository, ImageRepository $imageRepository)
    {
        $this->partnerRepository = $partnerRepository;
        $this->imageRepository = $imageRepository;
    }

    public function getPartners(){
        try{
            $partners = $this->partnerRepository->getAll();
            foreach($partners as $partner){
                $partner->image=url('uploads/images/partner/'.$partner->image);
            }
            $data=['partners'=>$partners];
            return $this->successData('Successfully Fetched',$data,200);

        }catch(\Exception $e){
            return $this->errordata('Unable to fetch settings due to some server error!',$e->getMessage(),500);
        }

    }
}
