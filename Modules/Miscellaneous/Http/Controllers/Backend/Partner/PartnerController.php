<?php

namespace Modules\Miscellaneous\Http\Controllers\Backend\Partner;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Miscellaneous\Http\Requests\PartnerValidate;
use Modules\Miscellaneous\Repository\Partner\PartnerRepository;
use App\Repository\ImageRepository;

class PartnerController extends Controller
{

    private $partnerRepository;
    private $imageRepository;

    public function __construct(PartnerRepository $partnerRepository, ImageRepository $imageRepository)
    {
        $this->partnerRepository = $partnerRepository;
        $this->imageRepository = $imageRepository;
    }


    public function index()
    {
        try{
            $partners = $this->partnerRepository->getAll();
            return view('miscellaneous::backend.partner.partner-index', compact('partners'));
        }catch(\Exception $e){
            echo $e->getMessage();
        }
       
    }

    public function add()
    {
        return view('miscellaneous::backend.partner.add-partner');
    }

    public function store(PartnerValidate $request)
    {
        try{

            if($request->hasFile('image')) {
                $validatedData = $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg|max:5000',
                ]);
            }

            $data = [
                'company_name' => $request->company_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
            ];

            $data["image"] = $this->imageRepository->saveImage($request, 'partner');

            $this->partnerRepository->create($data);

            $notification = array(
                'message' => 'Partner Added Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

        }catch(\Exception $e){
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        
    }

    public function edit($id)
    {
        try{

            $partner = $this->partnerRepository->findById($id);
            return view('miscellaneous::backend.partner.edit-partner', compact('partner'));

        }catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function update(PartnerValidate $request)
    {
        try{

            dd($request->all());

        }catch(\Excetion $e){
            echo $e->getMessage();
        }
    }


}
