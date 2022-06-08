<?php

namespace Modules\Miscellaneous\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Miscellaneous\Repository\Banner\BannerRepository;
use App\Repository\ImageRepository;
use App\Http\Controllers\Api\ApiBaseController;


class BannerController extends ApiBaseController
{
    private $imageRepository;
    private $bannerRepository;

    public function __construct(ImageRepository $imageRepository, BannerRepository $bannerRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->bannerRepository = $bannerRepository;
    }
    
    public function getBanner(){
        try{
            $banner = $this->bannerRepository->first();
            
            $banner->image = url('uploads/images/banner/'.$banner->image);
            
            $data=['banner'=>$banner];
            return $this->successData('Successfully Fetched',$data,200);
    
        }catch(\Exception $e){
            return $this->errordata('Unable to fetch banner due to some server error!',$e->getMessage(),500);
        }
    }
   

}
