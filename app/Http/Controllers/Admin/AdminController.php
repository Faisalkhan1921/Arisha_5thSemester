<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\city;
use App\Models\Admin;
use App\Models\province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('providerpanel.login');
    }

    public function dashbaord()
    {
        $data = Auth::guard('admin')->user();
        return view('providerpanel.index',compact('data'));
    }

    public function login(Request $requset)
    {
        //  dd($requset->all());   

        $check = $requset->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' =>$check['password'] ]))
        {
            return redirect()->route('admin.dashboard')->with('error','Successfully Logged in');

        }
        else 
        {
            return redirect()->back()->with('error','Invalid Admin Credentials');
        }
    }

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error','Admin Logged Out Successfully');

    }

    public function register()
    {
        $city = city::all();
        $province = province::all();
        return view("providerpanel.register",compact("city","province"));
    }

    public function register_store(Request $request)
    {
        // dd($requset->all());

        $request->validate([
            "password" => 'required',
            "confirmation_password" => 'required|same:password',
        ]);
        Admin::insert([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'province' => $request->province,
            'organization' => $request->organization,
            'sp_type' => $request->sp_type,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('login_form')->with('error','Provider Created Created Successfully');
    }
    



    public function view_profile()
    {
        $data = Auth::guard('admin')->user();
        return view('providerpanel.profile.profile_view',compact('data'));
    }

    public function edit_profile()
    {
        $data = Auth::guard('admin')->user();
        return view('providerpanel.profile.profile_editview',compact('data'));
    }

    public function update_profile(Request $request, $id)
    {
        Admin::findOrFail($id)->update([
            'name'=> $request->name,  
            'email'=> $request->email,  
            'age'=> $request->age,  
            'weight'=> $request->weight,  
            'height'=> $request->height,  
            'nationality'=> $request->nationality,  
            'gender'=> $request->gender,  
        ]);

        return redirect()->back()->with('success','Profile Updated Successfully');
    }
}


