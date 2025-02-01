<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function abc()
    {
        $Sizes=ProductSize::all();
        $Sizes=ProductSize::orderBy('id','asc')->paginate(5);
        return view('admin.sdetail.indexxx',compact('Sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Sizes=Size::all();
        $Products=Product::all();
        return view('admin.sdetail.create',compact('Sizes','Products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Product' => 'required',
            'Size' => 'required',
        ]);

        ProductSize::create([
            'product_id'=>$request->get('Product'),
            'size_id'=>$request->get('Size'),
        ]);
        return redirect()->route('admin.product_size.index');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=ProductSize::all();

        $Size=ProductSize::findOrFail($id);
        return view('admin.sdetail.edit',compact('Size','category'));
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
        $Size=ProductSize::findOrFail($id);
        $Size->delete();
        return redirect()->route('admin.product_size.index');
    }
}
