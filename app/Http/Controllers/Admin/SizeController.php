<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexx()
    {
        $Sizes=Size::orderBy('id','asc')->paginate(5);
        return view('admin.size.index',compact('Sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::all();
        return view('admin.size.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Size' => 'required|unique:sizes,Size',
        ]);

        Size::create([
            'size'=>$request->get('Size'),
        ]);
        return redirect()->route('admin.size.index');
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
        $category=Category::all();

        $Size=Size::findOrFail($id);
        return view('admin.size.edit',compact('Size','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Size=Size::findOrFail($id);
        $request->validate([
           'Size' => 'required|unique:sizes,size,' . $Size->id,

            ]);

        $Size->update([
            'size'=>$request->get('Size'),
        ]);
        return redirect()->route('admin.size.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Size=Size::findOrFail($id);
        $Size->delete();
        return redirect()->route('admin.size.index');


    }
}
