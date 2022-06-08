<?php

namespace Modules\AboutUs\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\ImageRepository;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Modules\AboutUs\Entities\About;
use Modules\AboutUs\Http\Requests\AboutRequest;
use Modules\AboutUs\Repository\AboutRepository;

class AboutUsController extends Controller
{
    private $aboutRepository;
    private $imageRepository;

    public function __construct(AboutRepository $aboutRepository, ImageRepository $imageRepository)
    {
        $this->aboutRepository = $aboutRepository;
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        try {
          
            $items = $this->aboutRepository->all();
            return view('aboutus::aboutus.index', compact('items'));
        } catch (\Exception$e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Request $request)
    {
        try{
            $item = $this->aboutRepository->findBySlug($request->slug);
            return view('aboutus::aboutus.edit', compact('item'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    
    public function update(AboutRequest $request)
    {
        try {

            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'slug' => SlugService::createSlug(About::class, 'slug', $request->title),
                'our_mission' => $request->our_mission,
                'our_vision' => $request->our_vision,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'seo_keyword' => $request->seo_keyword,
            ];
            $about = $this->aboutRepository->findBySlug($request->slug);
           
             /**
             * if image is not empty then update image
             */
            if ($request->hasFile('image')) {
                if (isset($about->image) || empty($about->image)) {
                    $this->imageRepository->removeImage($about,'about');
                }
                $data['image'] = $this->imageRepository->saveImage($request, 'about');
            }
           
            $this->aboutRepository->update($data, $about->id);
            return redirect()->route('about.index')->with('success', 'About Us Updated Successfully');
        } catch (\Exception$e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
