<?php

namespace App\Http\Controllers;

use session;
use Carbon\Carbon;
use App\Models\city;
use App\Models\User;
use App\Models\province;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\SeekerContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SeekerContactController extends Controller
{
    //

    public function index()
    {
        $id = Auth::User()->id;
        $data = SeekerContact::where('userid',$id)->latest()->get();
        return view('frontend.dashbaord',compact('data'));
    }

    public function contact_cancel($id)
    {
        SeekerContact::findOrFail($id)->update([
            'status' => 2,
            'updated_at' => Carbon::Now(),
        ]);

        return redirect()->back();
    }

    public function seeker_profile()
    {
        $id = Auth::User()->id;
        $profile = User::where('id',$id)->latest()->first();
        $province = province::all();
        $city = city::all();
        return view('frontend.dashbaord',compact('profile','province','city'));
    }

    public function seeker_profile_update(Request $request,$id)
    {
        User::findOrFail($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'province'=>$request->province,
            'city'=>$request->city,
            'password'=>Hash::make($request->password),
            'real_password'=>$request->password,
        ]);

        return redirect()->back()->with('success','Profile Updated Successfully');
    }



}
