<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\city;
use App\Models\User;
use App\Models\Admin;
use App\Models\Shops;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\province;
use App\Models\Services;

use Illuminate\Http\Request;
use App\Models\SeekerContact;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Auth;

class HomeContoller extends Controller
{
    //

    public function about() 
    {
        return view("frontend.aboutus");
    }

    public function services()
    {
        $data = Services::all();
        $category  = category::all();
        $province = province::all();
        $city = city::all();
        return view("frontend.pages.services",compact('data','category','province','city'));
    }

    public function services_detail($id)
    {
        $cat_data = Category::all();
        $data1 = Services::findOrFail($id);
        return view("frontend.pages.services_detail",compact('cat_data','data1'));
    }

    public function services_detail_paint($id)
    {
        $cat_data = Category::all();
        $data1 = Services::findOrFail($id);
        return view("frontend.pages.services_detail_paint",compact('cat_data','data1'));
    }

    public function services_detail_plumber($id)
    {
        $cat_data = Category::all();
        $data1 = Services::findOrFail($id);
        return view("frontend.pages.services_detail_plumber",compact('cat_data','data1'));
    }

    public function services_detail_architect($id)
    {
        $cat_data = Category::all();
        $data1 = Services::findOrFail($id);
        return view("frontend.pages.services_detail_architect",compact('cat_data','data1'));
    }

    public function services_detail_electrician($id)
    {
        $cat_data = Category::all();
        $data1 = Services::findOrFail($id);
        return view("frontend.pages.services_detail_electrician",compact('cat_data','data1'));
    }

    public function services_detail_shuttering($id)
    {
        $cat_data = Category::all();
        $data1 = Services::findOrFail($id);
        return view("frontend.pages.services_detail_shuttering",compact('cat_data','data1'));
    }

    public function seeker_contact(Request $request, $id)
    {

        if (Auth::check()) {
                $data = Services::findOrFail($id);
                $p_id = $data->user_id;
                $cat = $data['category']['category_name'];
                $service = $data->service_name;
                $userid = Auth::user()->id;
        
                // SeekerContact::insert([
                //     'name' => $request->name,
                //     'userid' => $userid,
                //     'email' => $request->email,
                //     'phone' => $request->phone,
                //     'address' => $request->address,
                //     'message' => $request->message,
                //     'category_id' => $cat,
                //     'service_name' => $service,
                //     'provider_id' =>$p_id,
                //     'status' => 0,
                //     'created_at' => Carbon::now(),
                // ]);
        

        $amount = rand(10,999);
        \Stripe\Stripe::setApiKey('sk_test_51OVdssJ0ApPSL3ZvuzDiHrNIOxa4gZlEN5Gw6FpqgIxIKtzf5T2KvbZIxY6zXpAFEJuzuCpZbge0SORlqg7NdSsc001GZCM7N7');
  
        $intent = \Stripe\PaymentIntent::create([
              'amount' => ($amount)*100,
              'currency' => 'INR',
              'metadata' => ['integration_check'=>'accept_a_payment']
        ]);
  
        $data = array(
            'id' => $id,
            'phone' =>$request->phone,
            'address' => $request->address,
             'name'=> $request->name,
             'email'=> $request->email,
             'amount'=> $amount,
             'message' => $request->message,
             'client_secret'=> $intent->client_secret,
        );
       
       return view('stripe',['data'=>$data]);


        }

    }

        public function handlePaymentSuccess(Request $request)
{
    if (Auth::check()) {
        $data = Services::findOrFail($request->id);
        $p_id = $data->user_id;
        $cat = $data['category']['category_name'];
        $service = $data->service_name;
        $userid = Auth::user()->id;

        SeekerContact::insert([
            'name' => $request->name,
            'userid' => $userid,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message,
            'category_id' => $cat,
            'service_name' => $service,
            'provider_id' => $p_id,
            'status' => 0,
            'created_at' => now(),
        ]);

        return redirect('seeker/contact/data');
    }
}

            ////////////////////////////////////////end of email send code ===========================
      
    public function search(Request $request)
    {
         $category1 = $request->category_id;
         $province1 = $request->province_id;
         $city1 = $request->city_id;
 
        //  $data = Services::where('category_id',$category1)->orwhere('province_id',$province1)->orwhere('city_id',$city1)->get();
        $data = Services::where('category_id', $category1)
    ->where('province_id', $province1)
    
    ->get();
         
         $category  = category::all();
         $province = province::all();
         $city = city::all();
         session()->flash('data',$data);
         return view('frontend.pages.services',compact('category','province','city'));
 
    }
    




    // =============================================shops================================================================
    public function shops()
    {
        $data = Shops::all();
        $category  = category::all();
        $province = province::all();
        $city = city::all();
        return view("frontend.pages.shops",compact('data','category','province','city'));
    }

    public function shops_detail($id)
    {
        $cat_data = Category::all();
        $data1 = Shops::findOrFail($id);
        return view("frontend.pages.shops_detail",compact('cat_data','data1'));
    }

    public function shops_detail_paint($id)
    {
        $cat_data = Category::all();
        $data1 = Shops::findOrFail($id);
        return view("frontend.pages.shops_detail_paint",compact('cat_data','data1'));
    }

    public function shops_detail_plumber($id)
    {
        $cat_data = Category::all();
        $data1 = Shops::findOrFail($id);
        return view("frontend.pages.shops_detail_plumber",compact('cat_data','data1'));
    }

    public function shops_detail_architect($id)
    {
        $cat_data = Category::all();
        $data1 = Shops::findOrFail($id);
        return view("frontend.pages.shops_detail_architect",compact('cat_data','data1'));
    }

    public function shops_detail_electrician($id)
    {
        $cat_data = Category::all();
        $data1 = Shops::findOrFail($id);
        return view("frontend.pages.shops",compact('cat_data','data1'));
    }

    public function shops_detail_shuttering($id)
    {
        $cat_data = Category::all();
        $data1 = Shops::findOrFail($id);
        return view("frontend.pages.shops_detail_shuttering",compact('cat_data','data1'));
    }

    public function search_shops(Request $request)
    {
         $category1 = $request->category_id;
         $province1 = $request->province_id;
         $city1 = $request->city_id;
 
        //  $data = Services::where('category_id',$category1)->orwhere('province_id',$province1)->orwhere('city_id',$city1)->get();
        $data = Shops::where('category_id', $category1)
    ->where('province_id', $province1)
    
    ->get();
         
         $category  = category::all();
         $province = province::all();
         $city = city::all();
         session()->flash('data',$data);
         return view('frontend.pages.shops',compact('category','province','city'));
 
    }


    public function gallery()
    {
        $data = Shops::all();
        $category  = category::all();
        $province = province::all();
        $city = city::all();
        return view("frontend.pages.gallery.index",compact('data','category','province','city'));
    }

    public function gallery_detail($id)
    {
        $gallery = Gallery::where('category_id',$id)->latest()->get();
        return view("frontend.pages.gallery.gallery_details",compact('gallery'));
    }
}
