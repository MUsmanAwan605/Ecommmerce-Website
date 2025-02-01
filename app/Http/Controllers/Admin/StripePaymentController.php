<?php

namespace App\Http\Controllers\Admin;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Stripe\Exception\ApiErrorException;

class StripePaymentController extends Controller
{

    public function createCheckoutSession(Request $request)
    {
        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));

        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $request->product_name, // Pass the product name here
                            // Add other fields if needed, like 'description' or 'images'
                        ],
                        'unit_amount' => $request->price * 100, // Price in cents
                        'tax_behavior' => 'exclusive',
                    ],
                    'quantity' => $request->quantity,
                ],
            ],
            // 'automatic_tax' => ['enabled' => true],
            'mode' => 'payment',
          'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cancel'),
        ]);

        // dd($response); // Dump the response to see the result
        if(isset($response->id) && $response->id != ''){
            return redirect($response->url);
        }
        else{
            return redirect()->route('cancel');
        }
    }


    public function success(Request $request){

        if(isset($request->session_id)) {

            $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            //dd($response);

            $payment = new Payment();
            $payment->payment_id = $response->id;
            $payment->product_name = session()->get('product_name');
            $payment->quantity = session()->get('quantity');
            $payment->amount = session()->get('price');
            $payment->currency = $response->currency;
            $payment->customer_name = $response->customer_details->name;
            $payment->customer_email = $response->customer_details->email;
            $payment->payment_status = $response->status;
            $payment->payment_method = "Stripe";
            $payment->save();

            return "Payment is successful";

            session()->forget('product_name');
            session()->forget('quantity');
            session()->forget('price');

        } else {
            return redirect()->route('cancel');
        }
    }

    public function cancel(){
        echo 'cancelled';

    }
}

