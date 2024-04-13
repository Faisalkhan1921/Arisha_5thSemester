<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    //
    public function index(){
        $amount = rand(10,999);
        \Stripe\Stripe::setApiKey('sk_test_51OVdssJ0ApPSL3ZvuzDiHrNIOxa4gZlEN5Gw6FpqgIxIKtzf5T2KvbZIxY6zXpAFEJuzuCpZbge0SORlqg7NdSsc001GZCM7N7');
  
        $intent = \Stripe\PaymentIntent::create([
              'amount' => ($amount)*100,
              'currency' => 'INR',
              'metadata' => ['integration_check'=>'accept_a_payment']
        ]);
  
        $data = array(
             'name'=> 'Sandeep',
             'email'=> 'email@gmail.com',
             'amount'=> $amount,
             'client_secret'=> $intent->client_secret,
        );
       
       return view('stripe',['data'=>$data]);
  
      }

      public function success(){
        return view('success');
       }
}
