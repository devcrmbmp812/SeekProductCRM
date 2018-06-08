<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;
use App\Profile_role;
use App\Profile_industry;
use App\Profile_phone_type;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * whe Create a new controller instance.
     *
     * @return void
     */
    
      
    public function add_intro_info(Request $request){
    	$validator = Validator::make($request->all(), [
            "surname"      =>  'required|string|max:255',
            "lasname"      =>  'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/main')
                        ->withErrors($validator)
                        ->withInput();
        }
    	//update user table
    	$user = Auth::user();
    	$user->surname = $request->input('surname');
    	$user->lasname = $request->input('lasname');
    	$user->save();

        $profile = Profile::firstOrNew(array('user_id' => $user->id));
        $profile->headline = $request->input('headline');
        $profile->overview = $request->input('overview');
    	//update or create profile table
        
    	if($request->file('profile_image')){
    		$profile_image = $request->file('profile_image');	
            $profile_file_name = 'profile_image_' . Carbon::now()->timestamp . '.' . $profile_image->getClientOriginalExtension();
            $profile_image->move(public_path() . '/image/profile_image/', $profile_file_name);
            $profile->profile_image = 'image/profile_image/'.$profile_file_name;
    	}
    	if($request->file('cover_image')){
    		$cover_image = $request->file('cover_image'); 
            $cover_file_name = 'cover_image_' . Carbon::now()->timestamp . '.' . $cover_image->getClientOriginalExtension();
            $cover_image->move(public_path() . '/image/cover_image/', $cover_file_name);
            $profile->cover_image = 'image/cover_image/'.$cover_file_name;
    	}        
		$profile->save();
        $pageinfo['profile'] = Profile::firstOrNew(array('user_id' => Auth::user()->id));
        $pageinfo['roles'] = Profile_role::all();
        $pageinfo['industries'] = Profile_industry::all();
        $pageinfo['phone_types'] = Profile_phone_type::all();
        $pageinfo['progress'] = "success";
		return $pageinfo;
    }

    public function add_company_info(Request $request){
    	$user = Auth::user();
    	$validator = Validator::make($request->all(), [
            "company"      =>  'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/main')
                        ->withErrors($validator)
                        ->withInput();
        }

        $profile = Profile::firstOrNew(array('user_id' => $user->id));
		$profile->company = $request->input('company');
		$profile->save();
		
        $pageinfo['profile'] = Profile::firstOrNew(array('user_id' => Auth::user()->id));
        $pageinfo['roles'] = Profile_role::all();
        $pageinfo['industries'] = Profile_industry::all();
        $pageinfo['phone_types'] = Profile_phone_type::all();
        $pageinfo['progress'] = "success";
        return $pageinfo;
    }

    public function add_role_info(Request $request){
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            "role"      =>  'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/main')
                        ->withErrors($validator)
                        ->withInput();
        }
        $profile = Profile::firstOrNew(array('user_id' => $user->id));
        $profile->role = $request->input('role');
        $profile->save();
        
        $pageinfo['profile'] = Profile::firstOrNew(array('user_id' => Auth::user()->id));
        $pageinfo['roles'] = Profile_role::all();
        $pageinfo['industries'] = Profile_industry::all();
        $pageinfo['phone_types'] = Profile_phone_type::all();
        $pageinfo['progress'] = "success";
        return $pageinfo;
    }

    public function add_date_info(Request $request){
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            "start_date"      =>  'required|string|max:255',
            "end_date"      =>  'required|string|max:255',
            "industry"      =>  'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/main')
                        ->withErrors($validator)
                        ->withInput();
        }
        $profile = Profile::firstOrNew(array('user_id' => $user->id));
        $profile->start_date = $request->input('start_date');
        $profile->end_date = $request->input('end_date');
        $profile->industry = $request->input('industry');
        $profile->save();
        
        $pageinfo['profile'] = Profile::firstOrNew(array('user_id' => Auth::user()->id));
        $pageinfo['roles'] = Profile_role::all();
        $pageinfo['industries'] = Profile_industry::all();
        $pageinfo['phone_types'] = Profile_phone_type::all();
        $pageinfo['progress'] = "success";
        return $pageinfo;
    }

    public function add_contact_info(Request $request){
        $validator = Validator::make($request->all(), [
            "phone"      =>  'required|string|max:255',
            "address"      =>  'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/main')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = Auth::user();
        $user->email = $request->input('email');
        $user->save();

        $profile = Profile::firstOrNew(array('user_id' => $user->id));
        $profile->phone = $request->input('phone');
        $profile->phone_type = $request->input('phone_type');
        $profile->address = $request->input('address');
        $profile->save();
        
        $pageinfo['profile'] = Profile::firstOrNew(array('user_id' => $user->id));
        $pageinfo['roles'] = Profile_role::all();
        $pageinfo['industries'] = Profile_industry::all();
        $pageinfo['phone_types'] = Profile_phone_type::all();
        $pageinfo['progress'] = "success";
        return $pageinfo;
    }

    public function add_overall_info(Request $request){
        $validator = Validator::make($request->all(), [
            "surname_t"      =>  'required|string|max:255',
            "lasname_t"      =>  'required|string|max:255',
            "company_t"      =>  'required|string|max:255',
            "role_t"      =>  'required|string|max:255',
            "start_date_t"      =>  'required|string|max:255',
            "end_date_t"      =>  'required|string|max:255',
            "industry_t"      =>  'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/main')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        //update user table
        $user = Auth::user();
        $user->surname = $request->input('surname_t');
        $user->lasname = $request->input('lasname_t');
        $user->email = $request->input('email_t');
        $user->save();

        $profile = Profile::firstOrNew(array('user_id' => $user->id));
        $profile->headline = $request->input('headline_t');
        $profile->overview = $request->input('overview_t');
        //update or create profile table

        if($request->file('profile_image_t')){
            $profile_image = $request->file('profile_image_t');   
            $profile_file_name = 'profile_image_' . Carbon::now()->timestamp . '.' . $profile_image->getClientOriginalExtension();
            $profile_image->move(public_path() . '/image/profile_image/', $profile_file_name);
            $profile->profile_image = 'image/profile_image/'.$profile_file_name;
        }
        if($request->file('cover_image_t')){
            $cover_image = $request->file('cover_image_t'); 
            $cover_file_name = 'cover_image_' . Carbon::now()->timestamp . '.' . $cover_image->getClientOriginalExtension();
            $cover_image->move(public_path() . '/image/cover_image/', $cover_file_name);
            $profile->cover_image = 'image/cover_image/'.$cover_file_name;
        }        
        $profile->company = $request->input('company_t');
        $profile->role = $request->input('role_t');
        $profile->start_date = $request->input('start_date_t');
        $profile->end_date = $request->input('end_date_t');
        $profile->industry = $request->input('industry_t');
        $profile->phone = $request->input('phone_t');
        $profile->phone_type = $request->input('phone_type_t');
        $profile->address = $request->input('address_t');
        $profile->save();

        $pageinfo['progress'] = "success";
        return $pageinfo;
    }
}
