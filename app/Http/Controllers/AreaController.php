<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\city;
use App\Models\province;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    //
    public function index()
    {
        return view("providerpanel.province.index");
    }

    public function store_province (Request $request) 
    {
        province::insert([
            "province_name"=> $request->p_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Province Added Successfully');
    }


    public function city_index()
    {
        $data = province::all();
        return view("providerpanel.city.index",compact('data'));
    }

    public function store_city (Request $request) 
    {
        city::insert([
            "province_id"=> $request->province_id,
            "city_name"=> $request->c_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'City Added Successfully');
    }
}
