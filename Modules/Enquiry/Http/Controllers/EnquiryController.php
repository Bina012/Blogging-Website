<?php

namespace Modules\Enquiry\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Enquiry\Repository\EnquiryRepository;

class EnquiryController extends Controller
{
    private $EnquiryRepository;

    public function __construct(EnquiryRepository $enquiryRepository)
    {
        $this->enquiryRepository = $enquiryRepository;
    }

    public function get()
    {
        try {
            $enquiries = $this->enquiryRepository->updateMail();
            return view('enquiry::enquiry.view-enquiry', compact('enquiries'));
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = [
                'email' => $request->email,
            ];
            $this->enquiryRepository->create($data);
            $notification = array(
                'message' => 'enquiry Added Successfully',
                'alert-type' => 'success',
            );
            return redirect()->Back()->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        }
    }

   public function delete(Request $request)
    {
        try {
            $enquiry = $this->enquiryRepository->findById($request->id);
            $enquiry['status'] = 0;
            $enquiry->save();
            return redirect()->route('enquiry.get')->with('success', 'Email Delete successfully');
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            return redirect()->back()->with('error', $exception);
        }
 
   }
  

}
