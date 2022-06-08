<?php

namespace Modules\Dashboard\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Miscellaneous\Entities\Blog;
use Carbon\Carbon;
use Modules\Miscellaneous\Entities\BlogCount;

class DashboardController extends Controller
{
    public function index()
    {
        try{
            $blogs = Blog::get();
            $weeklyCount = BlogCount::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            $dailyCount = BlogCount::where('created_at','>=' ,today())->get();
            $monthlyCount = BlogCount::whereMonth('created_at',now()->format('m'))
            ->whereYear('created_at',now()->format('Y'))
            ->get();    
            return view('dashboard::backend.dashboard',compact('blogs','weeklyCount','monthlyCount','dailyCount'));
        } catch (\Exception $e) {
                dd($e);
        }
    }
}
