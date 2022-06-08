<?php

namespace Modules\Miscellaneous\Http\Controllers\Backend\Banner;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\ImageRepository;
use Modules\Miscellaneous\Repository\Banner\BannerRepository;
use App\Http\Controllers\Api\ApiBaseController;

class BannerController extends Controller
{
    private $imageRepository;
    private $bannerRepository;

    public function __construct(ImageRepository $imageRepository, BannerRepository $bannerRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->bannerRepository = $bannerRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        try{
            $banner = $this->bannerRepository->first();
            return view('miscellaneous::backend.banner.banner-index',compact('banner'));

        }catch(\Exception $e){
                
         return redirect()->back()->with('error',$e->getMessage());
    
        }
      
       
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
       try{

        if ($request->hasFile('image')) {
            $validatedData = $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg|max:5000',
            ]);

            $banner = $this->bannerRepository->find($request->id);
            if (isset($banner->image)) {
                $this->imageRepository->removeImage($banner,'banner');
            }
            $data["image"]=$this->imageRepository->saveImage($request,'banner');

            $this->bannerRepository->update($data,$request->id);

            $notification = array(
                'message' => 'Banner Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }else{

            $notification = array(
                'message' => 'Changes is not occured',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }

       }catch(\Exception $e){
           return redirect()->back()->with('error',$e->getMessage());
       }
       
    }

}
