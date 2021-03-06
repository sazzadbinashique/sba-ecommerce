<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Mail;
use Mail;
use Cart;
use Session;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

 public function index(){

     if(Cart::content()->count() == 0)
     {
         Session::flash('info', 'Your cart is still empty. do some shopping');
         return redirect()->back();
     }
     return view('checkout');
 }
    public function pay(){


        Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'practice selling books',
            'source' => request()->stripeToken
        ]);

        Session::flash('success', 'Purchase successfully. wait for our email.');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect('/');
    }


}
