<?php

namespace Modules\Auth\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Http\Requests\AuthRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        $user = auth()->user();
        if($user != null){
           
            return redirect(route('user.dashboard'));
        }
        else{
            return view('auth::frontend.login');
        }
    }

    public function login(AuthRequest $request){
        try {
            // $user=User::where('email',$request->email)->first();
            // if(!$user->hasRole('user')){
            //     return redirect()->back()->with('error', 'User does not exists');
            // }
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->intended(route('user.dashboard'))->with('success', 'Logged in Successfully !');
            } else {
                return redirect()->back()->with('error', 'Invalid Login Credential');
            }
        } catch (QueryException $q) {
            return $q->getMessage();
        } catch (\Exception $e) {
            return $e->getMessage();
        }


    }


    public function logOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/login')->with('success', 'Logged Out Successfully !');
    }

    
}
