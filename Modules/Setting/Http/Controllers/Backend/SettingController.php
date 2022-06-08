<?php

namespace Modules\Setting\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\PaginateRepository;
use App\Repository\ImageRepository;
use Modules\Setting\Http\Requests\SettingRequest;
use Modules\Setting\Repository\SettingRepository;

class SettingController extends Controller
{
    private $settingRepository;

    private $paginationRepository;

    private $imageRepository;

    public function __construct(SettingRepository $settingRepository, PaginateRepository $paginationRepository, ImageRepository $imageRepository)
    {
        $this->settingRepository = $settingRepository;
        $this->paginationRepository = $paginationRepository;
        $this->imageRepository=$imageRepository;
    }

    public function index(Request $request)
    {
        try {
            $setting = $this->settingRepository->first();
            return view('setting::backend.setting.view-setting')->with('setting', $setting);
        } catch (\Exception$e) {
            $exception = $e->getMessage();
            return redirect()->back()->with('error', $exception);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = [
                'company_name'=> $request->company_name,
                'email1'=> $request->email,
                'contact1'=> $request->contact,
                'address'=> $request->address,
                'google_location'=> $request->google_location,
                'fax_no' => $request->fax_no,
                'po_box_no' => $request->po_box_number,
                'facebook_link' => $request->facebook_link,
                'twitter_link' => $request->twitter_link,
                'insta_link' => $request->insta_link,
                'linkedin_link' => $request->linkedin_link,
            ];
            if ($request->hasFile('image')) {
                    $setting = $this->settingRepository->find($request->id);
                    if (isset($setting->image)) {
                        $this->imageRepository->removeImage($setting,'setting');
                    }
                    $data["image"]=$this->imageRepository->saveImage($request,'setting');
            }
            $setting = $this->settingRepository->update($data, $request->id);
            $notification = array(
                'message' => 'Setting Added Successfully',
                'alert-type' => 'success',
            );
        
            return redirect()->route('cd-admin.setting')->with($notification);
        } catch (\Exception$e) {
            $exception = $e->getMessage();
            return redirect()->back()->with('error', $exception);
        }

    }

    public function destroy($slug)
    {
        try {
            $setting = $this->settingRepository->findBySlug($slug);
            if(isset($setting->image)){
                $this->imageRepository->removeImage($setting,'setting');
            }
            $data = $this->settingRepository->deleteBySlug($slug);
            return redirect()->route('cd-admin.setting')->with('success', 'About Us deleted successfully');
        } catch (\Exception$e) {
            $exception = $e->getMessage();
            return redirect()->back()->with('error', $exception);
        }

    }

}
