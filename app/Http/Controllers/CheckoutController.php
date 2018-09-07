<?php

namespace App\Http\Controllers;

use Mail;
use Cart;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;
use Session;
use App\Mail\PurchaseSuccessful;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Cart::content()->count() == 0)
        {
            Session::flash('info', 'Your cart is still empty. Do some shopping');
            return redirect()->back();
        }
        return view('checkout');
    }

    public function pay()
    {
        Stripe::setApiKey("sk_test_4xG1uIEXjE2oxbQMhkU9T8sS");

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'e-commerce selling books',
            'source' => request()->stripeToken
        ]);

        Session::flash('success', 'Purchase successful. wait for our email');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new PurchaseSuccessful());

        return redirect('/');
    }
}
