<?php

namespace Modules\Miscellaneous\Http\Controllers\Backend\Tag;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Miscellaneous\Repository\Tag\TagRepository;

class TagController extends Controller
{

    private $tagRepository;
    

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
       
    }

    public function add()
    {
        try{
            return view('miscellaneous::backend.tag.add-tag');
        }catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function index()
    {
        $tags = $this->tagRepository->all();
        return view('miscellaneous::backend.tag.view-tag',compact('tags'));
    }

   
    public function store(Request $request)
    {
        try{
            $data = [
                'tag' => $request->tag,
            ];
            $this->tagRepository->create($data);
            $notification = array(
                'message' => 'Tag Added Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('tag.index')->with($notification);
        
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    
    public function edit($id)
    {
        try {
            $tags = $this->tagRepository->findById($id);
            return view('miscellaneous::backend.tag.edit-tag', compact('tags'));
        } catch (\Exception $e) {

            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
            return redirect()->Back()->with($notification);
        } 
    }

   
    public function update(Request $request)
    {
        try{
            $request->validate([
                'tag' => 'required'
            ]);
            $data = [
               'tag' => $request->tag 
            ];
            $this->tagRepository->update($data,$request->id);
            $notification = array(
                'message' => 'Tag Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('tag.index')->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            );
        }    

    }

  
    public function delete(Request $request)
    {
        try{
            $this->tagRepository->delete($request->id);
            $notification = array(
            'message' => 'Tag Deleted Successfully',
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
}
