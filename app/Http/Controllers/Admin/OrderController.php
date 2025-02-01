<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Orders=Order::all();

        // $users = DB::table('order')
        // ->join('orderitems', 'orderitems.order_number', '=', 'orderitems.order_number')
        // ->select('order.*', 'order.order_number', 'orderitems.order_number');

        $orderitems = DB::table('orderitems')
    ->join('orders', 'orderitems.order_id', '=', 'orders.id')
    ->select('orders.*', 'orderitems.order_id')
            ->get();

        return view('admin.order.index', compact('Orders', 'orderitems'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Order = Order::find($id);

        // Check if the billing record exists
        if (!$Order) {
            return redirect()->back()->with('error', 'Billing record not found.');
        }

       $billings = DB::table('order')
    ->leftJoin('orderitems', 'order.id', '=', 'orderitems.order_id') // Update column name
    ->where('order.id', $id)
    ->select('order.*', 'orderitems.*')
    ->get();
        return view('admin.order.show', compact('billings','Order'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
