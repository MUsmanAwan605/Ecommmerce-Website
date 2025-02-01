<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use function PHPUnit\Framework\returnSelf;

class OrderTrackingController extends Controller
{
   public function index(){
        return view('frontend.ordertracking.index');
    }

    public function OrderTracking(Request $request)
    // public function store(Request $request)
    {

        $request->validate([
            'track-number'=>'required'
        ]);
        $abc=$request->get('track-number');
      
      $order=Order::where('customer_phone',$abc)->first();
   
    //   if(!$order){
    //     // return redirect()->back()->with('order is not Found');
    //     echo "Order not found";
    //   }

      dd($order);

        }
    
}
