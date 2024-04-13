<?php

namespace App\Http\Controllers;

use Image;
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
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    //
    public function index()
    {
        return view("providerpanel.category.index");
    }

    public function store(Request $request) 
    {
        Category::insert([
            'category_name' => $request->input('category_name'),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Category Added Successfully');
    }

    public function index_services()
    {
        $province = province::all();
        $city = city::all();   
        $category = Category::all(); 
        return view("providerpanel.services.index",compact('province','city','category'));
    }

    public function services_store(Request $request)    
    {
        if ($request->hasFile('cover_image')) {

        // Get the uploaded file
        $image = $request->file('cover_image');

        // Generate a unique name for the file
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        // Resize and save the image
        $save_url = 'upload/services/' . $name_gen;
        Storage::disk('public')->put($save_url, file_get_contents($image));

        $user_id = Auth::guard('admin')->user()->id;
        Services::insert([
            'user_id' => $user_id,
            'service_name' => $request->service_name,
            'service_provider_phone' => $request->service_provider_phone,
            'service_provider_phone' => $request->service_provider_phone,
            'category_id' => $request->category_id,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'description' => $request->description,
            'cover_image' => $save_url,
            'featured' => $request->featured,
            'created_at' => Carbon::now(),

        ]); 
        return redirect()->back()->with('success','Service Added Successfully');

    }
    else {
        // Handle the case when no file is uploaded
        return redirect()->back()->with('error', 'Please select a cover image');
    }

    }

    public function services_manage()
    {
        $id = Auth::guard('admin')->User()->id;
        // dd($id);
        $services = services::where('user_id',$id)->get();
        // dd($services);
        return view('providerpanel.services.manage',compact('services'));
    }

    public function services_delete(Request $request,$id)
    {
        $data =Services::findOrFail($id);
        if ($data->cover_image) {
            Storage::disk('public')->delete('upload/services/' . basename($data->cover_image));
        }
    
        $data->delete();

        return redirect()->back()->with('success','Service Deleted Successfully');

    }

    public function services_edit($id)
    {
        $data1 = Services::findOrFail($id);
        $province = province::all();
        $city = city::all();   
        $category = Category::all(); 
        return view('providerpanel.services.edit',compact('data1','province','city','category'));
    }

    public function services_update(Request $request,$id) 
    {
        if ($request->hasFile('cover_image')) {

            // Get the uploaded file
            $image = $request->file('cover_image');
    
            // Generate a unique name for the file
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    
            // Resize and save the image
            $save_url = 'upload/services/' . $name_gen;
            Storage::disk('public')->put($save_url, file_get_contents($image));
            $data= Services::findOrFail($id)->first();
            if ($data->cover_image) {
                Storage::disk('public')->delete('upload/services/' . basename($data->cover_image));
            }
    
            Services::findOrFail($id)->update([
                'service_name' => $request->service_name,
                'service_provider_phone' => $request->service_provider_phone,
                'service_provider_phone' => $request->service_provider_phone,
                'category_id' => $request->category_id,
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'description' => $request->description,
                'cover_image' => $save_url,
                'featured' => $request->featured,
                'updated_at' => Carbon::now(),
    
            ]); 
            return redirect()->back()->with('success','Service Added Successfully');
    
        }
        else {
            Services::findOrFail($id)->update([
                'service_name' => $request->service_name,
                'service_provider_phone' => $request->service_provider_phone,
                'service_provider_phone' => $request->service_provider_phone,
                'category_id' => $request->category_id,
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'description' => $request->description,
                // 'cover_image' => $save_url,
                'featured' => $request->featured,
                'created_at' => Carbon::now(),
    
            ]); 
            return redirect()->back()->with('success','Service Added Successfully');
        }
    }

        public function contacted_seekers()
        {
            $id = Auth::guard('admin')->user()->id; 
            $cont = SeekerContact::where('provider_id',$id)->get();
            return view('providerpanel.contact.index',compact('cont'));


        }

        public function contacted_approve(Request $request,$id)
        {
            SeekerContact::findOrFail($id)->update([
                'status'    => 1,
                'updated_at' => Carbon::now(),
            ]);


               // ====================================email send code ===========================
               
               $test = SeekerContact::findOrFail($id);

               $userdata = $test->userid;
               
               $pdata = $test->provider_id;
               $user = User::where('id',$userdata)->first();
            //    dd($user);
               $user2 = Admin::where('id',$pdata)->first();


               $u_email = $user->email;
               $p_email = $user2->email;
               $name1 = $user2->name;

               $p_name = $user2->sp_type;
               $p_mob = $user2->phone;
               $category = $test->category_id;
               $message = $test->message;
               $address = $test->address;
               // dd($p_email);
               $sub = 'Provider Approved Your Request.';
               $emailfrom = "BuildEase@gmail.com";
               $name = "BuildEase";
               $desc = '
               <h3>Greetings</h3>          
               
               <p>We are Pleased To inform you that Service Provider</p>' .$name1 . '<p> Has Approved Your Contact Request'  . '</p>'

               . '<table border="1">
               <thead>
               <tr>
               <th>Provider Name</th>
               <th>Provider Phone</th>
               <th>Category</th>
               <th>Message</th>
               <th>Seeker Address</th>
               </tr>
               </thead>
               <tbody>
               <td>'.$p_name.'</td>
               <td>'.$p_mob.'</td>
               <td>'.$category.'</td>
               <td>'.$message.'</td>
               <td>'.$address.'</td>
               </tbody>
               </table>
                '
               ;
           
                       try {
                           require 'PHPMailer/vendor/autoload.php';
                           $mail = new PHPMailer(true);
                           $mail->SMTPDebug = 0;
                           $mail->isSMTP();
                           $mail->Host       = 'smtp.gmail.com';
                           $mail->SMTPAuth   = true;
                           $mail->Username   = 'faisalawan1921@gmail.com';
                           $mail->Password   = 'knfdnljaqlzijzvx';
                           $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                           $mail->Port       = 587;
                           $mail->setFrom('buildease@gmail.com', $name);
                           $mail->addAddress($u_email);
                           $mail->isHTML(true);
                           $mail->Subject = $sub;
                           $mail->Body    = $desc;
           
                           $dt = $mail->send();
                           if ($dt) {
                               // return redirect()->back()->with('message', 'Email Send Successfully');
                               return redirect()->back()->with('success','Status Approved');
   
                           } else {
                               return redirect()->back()->with('error', 'Something Went Wrong');
                           }
           
                           // Remove the temporary file after attaching
                           unlink($filePath);
                       } catch (Exception $e) {
                           // Handle exceptions if any
                           echo 'Caught exception: ' . $e->getMessage();
                       }

        }






        // ==============================================shops code =============================================
        public function index_shops()
        {
            $province = province::all();
            $city = city::all();   
            $category = Category::all(); 
            return view("providerpanel.shops.index",compact('province','city','category'));
        }
    
        public function shops_store(Request $request)    
        {
            if ($request->hasFile('cover_image')) {
    
            // Get the uploaded file
            $image = $request->file('cover_image');
    
            // Generate a unique name for the file
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    
            // Resize and save the image
            $save_url = 'upload/shops/' . $name_gen;
            Storage::disk('public')->put($save_url, file_get_contents($image));
    
            Shops::insert([
                'shop_name' => $request->service_name,
                'shop_provider_phone' => $request->service_provider_phone,
                'category_id' => $request->category_id,
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'description' => $request->description,
                'cover_image' => $save_url,
                'featured' => $request->featured,
                'created_at' => Carbon::now(),
    
            ]); 
            return redirect()->back()->with('success','Shop Added Successfully');
    
        }
        else {
            // Handle the case when no file is uploaded
            return redirect()->back()->with('error', 'Please select a cover image');
        }
    
        }
    
        public function shops_manage()
        {
            $id = Auth::guard('admin')->User()->id;
            $services = Shops::where('user_id',$id)->get();
            return view('providerpanel.shops.manage',compact('services'));
        }
    
        public function shops_delete(Request $request,$id)
        {
            $data =Shops::findOrFail($id);
            if ($data->cover_image) {
                Storage::disk('public')->delete('upload/shops/' . basename($data->cover_image));
            }
        
            $data->delete();
    
            return redirect()->back()->with('success','Shop Deleted Successfully');
    
        }
    
        public function shops_edit($id)
        {
            $data1 = Shops::findOrFail($id);
            $province = province::all();
            $city = city::all();   
            $category = Category::all(); 
            return view('providerpanel.shops.edit',compact('data1','province','city','category'));
        }
    
        public function shops_update(Request $request,$id) 
        {
            if ($request->hasFile('cover_image')) {
    
                // Get the uploaded file
                $image = $request->file('cover_image');
        
                // Generate a unique name for the file
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        
                // Resize and save the image
                $save_url = 'upload/shops/' . $name_gen;
                Storage::disk('public')->put($save_url, file_get_contents($image));
                $data= Shops::findOrFail($id)->first();
                if ($data->cover_image) {
                    Storage::disk('public')->delete('upload/shops/' . basename($data->cover_image));
                }
        
                Shops::findOrFail($id)->update([
                    'shop_name' => $request->service_name,
                    'shop_provider_phone' => $request->service_provider_phone,
                    // 'service_provider_phone' => $request->service_provider_phone,
                    'category_id' => $request->category_id,
                    'province_id' => $request->province_id,
                    'city_id' => $request->city_id,
                    'description' => $request->description,
                    'cover_image' => $save_url,
                    'featured' => $request->featured,
                    'updated_at' => Carbon::now(),
        
                ]); 
                return redirect()->back()->with('success','Service Added Successfully');
        
            }
            else {
                Shops::findOrFail($id)->update([
                    'shop_name' => $request->service_name,
                    'shop_provider_phone' => $request->service_provider_phone,
                    // 'service_provider_phone' => $request->service_provider_phone,
                    'category_id' => $request->category_id,
                    'province_id' => $request->province_id,
                    'city_id' => $request->city_id,
                    'description' => $request->description,
                    // 'cover_image' => $save_url,
                    'featured' => $request->featured,
                    'created_at' => Carbon::now(),
        
                ]); 
                return redirect()->back()->with('success','Service Added Successfully');
            }
        }

        public function gallery()
        {
            $data = category::all();
            return view('providerpanel.gallery.index',compact("data"));

        }

        public function gallery_store(Request $request)
        {
              // Get the uploaded file
              $image = $request->file('gallery');
        
              // Generate a unique name for the file
              $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
      
              // Resize and save the image
              $save_url = 'upload/gallery/' . $name_gen;
              Storage::disk('public')->put($save_url, file_get_contents($image));
             
      
              Gallery::insert([
                 
                  'category_id' => $request->category_id,
                  'gallery' => $save_url,
                  'created_at' => Carbon::now(),
      
              ]); 
              return redirect()->back()->with('success','Service Added Successfully');
        }

        public function gallery_manage()
        {
            $data = Gallery::all();
            return view('providerpanel.gallery.manage',compact("data"));
        }

        public function gallery_delete(Request $request,$id)
        {
            $data =Gallery::findOrFail($id);
            if ($data->gallery) {
                Storage::disk('public')->delete('upload/gallery/' . basename($data->gallery));
            }
        
            $data->delete();
    
            return redirect()->back()->with('success','Gallery Picture Deleted Successfully');
        }


        public function gallery_edit($id)
        {
            
            $category = Category::all(); 
            $gallery = Gallery::findOrFail($id);
            return view('providerpanel.gallery.edit',compact('gallery','category'));
        }


        public function gallery_update(Request $request,$id)
        {
            if ($request->hasFile('gallery')) {
    
                // Get the uploaded file
                $image = $request->file('gallery');
        
                // Generate a unique name for the file
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        
                // Resize and save the image
                $save_url = 'upload/gallery/' . $name_gen;
                Storage::disk('public')->put($save_url, file_get_contents($image));
                $data= Gallery::findOrFail($id)->first();
                if ($data->cover_image) {
                    Storage::disk('public')->delete('upload/gallery/' . basename($data->cover_image));
                }
        
                Gallery::findOrFail($id)->update([
                    'category_id' => $request->category_id,
                    'gallery' => $save_url,
                    'updated_at' => Carbon::now(),
        
                ]); 
                return redirect()->back()->with('success','Gallery Added Successfully');
        
            }
            else {
                Gallery::findOrFail($id)->update([
                    'category_id' => $request->category_id,
                    'created_at' => Carbon::now(),
        
                ]); 
                return redirect()->back()->with('success','Gallery Added Successfully Without Image');
            }
        }
}
