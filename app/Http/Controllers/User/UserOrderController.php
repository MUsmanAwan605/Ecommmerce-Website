<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Order;
use Stripe\StripeClient;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public  function OrderPage()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $orders = Cart::where('user_id', $user->id)->get();
            $totalPrice = Cart::sum('total');
        }
        return view('frontend.order.index', compact('orders', 'totalPrice'));
    }
    public function Order(Request $request)
    {
        // Check if user is authenticated
        if (Auth::id()) {
            $user = Auth::user();

            // Create the order
            $Order = Order::create([
                'order_number' =>  strtoupper(substr(bin2hex(random_bytes(3)), 0, 5)),
                'cus_fname' => $request->get('fname'),
                'cus_lname' => $request->get('lname'),
                'customer_email' => $request->get('email'),
                'customer_phone' => $request->get('phone'),
                'customer_address' => $request->get('address'),
                'order_date' => now(),
                'total_amount' => $request->get('totalAmount'),
                'payment_method' => $request->get('payment_method'),
            ]);

            // Add products to the order
            foreach ($request->prod as $key => $productName) {
                $qty = $request->qty[$key];
                $price = $request->price[$key];
                $totalPrice = $qty * $price;

                OrderItem::create([
                    'order_id' => $Order->id,
                    'product_name' => $productName,
                    'quantity' => $qty,
                    'product_price' => $price,
                    'total_price' => $totalPrice,
                ]);
            }


            if ($request->get('payment_method') == 'DirectBankTransfer' || $request->get('payment_method') == 'DebitCardsorPaypal') {

                return $this->createCheckoutSession($request);
            } elseif ($request->get('payment_method') == 'CashonDelivery') {
                return view('frontend.order.view_order');
                // return redirect()->route('order.success')->with('message', 'Your order has been placed. Please pay on delivery.');
            }
        } else {
            // Handle case where user is not authenticated
            return redirect()->route('login')->with('error', 'Please login to place an order.');
        }
    }

    public function createCheckoutSession(Request $request)
    {
        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));

        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'pkr',
                        'product_data' => [
                            'name' => 'name',
                        ],
                        'unit_amount' => $request->get('totalAmount')*100,
                        'tax_behavior' => 'exclusive',
                    ],
                    'quantity' => 1,
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



}
