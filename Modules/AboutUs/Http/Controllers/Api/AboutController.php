<?php

namespace Modules\AboutUs\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Api\ApiBaseController;
use Modules\AboutUs\Repository\AboutRepository;
use App\Repository\ImageRepository;

class AboutController extends ApiBaseController
{
    private $aboutRepository;
    private $imageRepository;

    public function __construct(AboutRepository $aboutRepository,ImageRepository $imageRepository)
    {
        $this->aboutRepository = $aboutRepository;
        $this->imageRepository = $imageRepository;
    }
    public function getAbout()
    {
        try{
            
            $abouts = $this->aboutRepository->all();
            foreach($abouts as $about){
                $about->image=url('uploads/images/about/'.$about->image);
            }
            $data = ['abouts'=>$abouts];
            return $this->successData('Successfully Fetched',$data,200);
        }catch(\Exception $e)
        {
            return $this->errordata('Unable to fetch about detail due to some server error!',$e->getMessage(),500);

        }
    }
}
