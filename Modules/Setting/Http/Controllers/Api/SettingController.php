<?php

namespace Modules\Setting\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Repository\SettingRepository;
use App\Http\Controllers\Api\ApiBaseController;


class SettingController extends ApiBaseController
{
    private $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function getSetting()
    {
        try{

            $setting = $this->settingRepository->first();
            
            // change image url to public url
            $setting->image = url('uploads/images/setting/'.$setting->image);
            $data = [
                'setting' => $setting,
            ];
            return $this->successData("Success",$data,200);
        }catch(\Exception $e){
            return $this->errorData("Internal Server Error", $e, 500);
        }
    }
}
