<?php

namespace Modules\Miscellaneous\Http\Controllers\Backend\Services;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Miscellaneous\Repository\Services\ServicesRepository;
use App\Repository\ImageRepository;

class ServicesController extends Controller
{
    
    private  $servicesRepository;
    private $imageRepository;
    public function __construct(ServicesRepository $servicesRepository, ImageRepository $imageRepository)
    {
        $this->servicesRepository = $servicesRepository;
        $this->imageRepository = $imageRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $services = $this->servicesRepository->getAll();
        return view('miscellaneous::backend.services.service-index', compact('services'));
    }

    public function add()
    {
        return view('miscellaneous::backend.services.add-services');
    }

    public function store(Request $request)
    {
        try{

            if ($request->hasFile('image')) {
                $validatedData = $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg|max:5000',
                ]);
            }
            $image = $this->imageRepository->saveImage($request, 'service');
            
           $data['image'] = $image;

           $this->servicesRepository->create($data);  

            $notification = array(
                'message' => 'Services Added Successfully',
                'alert-type' => 'success',
            );
            return redirect()->Back()->with($notification);
        }catch(\Exception $e){
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }

    public function edit($id)
    {
        $service = $this->servicesRepository->findById($id);
        return view('miscellaneous::backend.services.edit-services', compact('service'));
    }

    public function update(Request $request)
    {
        try
        {
            if ($request->hasFile('image')) {

                $validatedData = $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg|max:5000',
                ]);

                $service = $this->servicesRepository->findById($request->id);

                if (isset($service->image)) {
                    $this->imageRepository->removeImage($service,'service');
                }
                $data["image"] = $this->imageRepository->saveImage($request,'service');
    
                $this->servicesRepository->update($data,$request->id);
    
                $notification = array(
                    'message' => 'Service Updated Successfully',
                    'alert-type' => 'success',
                );
                return redirect()->route('services.index')->with($notification);

            }else{
                $notification = array(
                    'message' => 'Nothing change to update',
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            }

        }catch(\Exception $e){
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }

    public function delete(Request $resquest)
    {
        try{
            $service = $this->servicesRepository->findById($resquest->id);
            if (isset($service->image)) {
                $this->imageRepository->removeImage($service,'service');
            }
            $this->servicesRepository->delete($resquest->id);
            $notification = array(
                'message' => 'Service Deleted Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('services.index')->with($notification);
        }catch(\Exception $e){
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }
    
}
