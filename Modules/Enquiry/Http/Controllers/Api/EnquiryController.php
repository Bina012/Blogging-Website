<?php

namespace Modules\Enquiry\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Api\ApiBaseController;
use Modules\Enquiry\Repository\EnquiryRepository;

class EnquiryController extends ApiBaseController
{
    private $EnquiryRepository;
   
    public function __construct(EnquiryRepository $enquiryRepository)
    {
        $this->enquiryRepository = $enquiryRepository;
        
    }
public function getAllEnquiry(){
    try{
           
        $enquiries = $this->enquiryRepository->getAll();
        $data=['enquries'=>$enquiries];
        return $this->successData('Successfully Fetched',$data,200);
    }catch(\Exception $e){
        return $this->errordata('Unable to fetch enquries due to some server error!',$e->getMessage(),500);

    }
}

public function storeEnquiry(Request $request)
{
    try{
        
        $data = [
            'email'=>$request->email,
        ];
        $enquiries=$this->enquiryRepository->create($data);     
            if(isset($enquiries->id)){
            return $this->successResponse('enquiries saved Successfully',200);
        }
        else{
            return $this->errorData("Unable to save enquries",$enquiries,500);
        }
    }catch(\Exception $e){
        return $this->errordata('Unable to save enquiries due to some server error!',$e->getMessage(),500);
    }
}

}
