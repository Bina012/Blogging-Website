<?php

namespace Modules\Dashboard\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $user=auth()->user();
            return view('dashboard::frontend.dashboard', compact('user'));
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
