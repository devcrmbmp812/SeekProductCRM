<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;
use App\Profile_role;
use App\Profile_industry;
use App\Profile_phone_type;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('guest')->only(['index']);
       $this->middleware('auth')->only(['home']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function home(){
        $pageinfo['user'] = Auth::user();
        $pageinfo['profile'] = Profile::firstOrNew(array('user_id' => Auth::user()->id));
        $pageinfo['roles'] = Profile_role::all();
        $pageinfo['industries'] = Profile_industry::all();
        $pageinfo['phone_types'] = Profile_phone_type::all();
        $pageinfo['progress'] = "";
        return view('main',$pageinfo);
    }

    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }
}
