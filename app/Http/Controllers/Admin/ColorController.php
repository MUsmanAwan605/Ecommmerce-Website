<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Colors=Color::orderBy('id','asc')->paginate('5');
        return view('admin.color.index',compact('Colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string',
            'Color' => 'required|string|unique:color,code',

        ]);

        Color::create([
            'name'=>$request->get('Name'),
            'code'=>$request->get('Color'),
            // 'code'=>$request->get('Code'),

        ]);
        return redirect()->route('admin.color.index')->with('success', 'Delete Add Successfully');
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
        $Color=Color::findOrFail($id);
        return view('admin.color.edit',compact('Color'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Color=Color::findOrFail($id);

        $request->validate([
          'Color' => 'required|string|unique:color,code,' . $Color->id,
            'Name' => 'required|string',
        ]);

        $Color->update([
            'name'=>$request->get('Name'),
            'code'=>$request->get('Color'),
            // 'code'=>$request->get('Code'),

        ]);
        return redirect()->route('admin.color.index')->with('success', 'Updated Color Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Color=Color::findOrFail($id);
        $Color->delete();
        return redirect()->route('admin.color.index')->with('success', 'Delete Color Successfully');

    }

    public function toggleStatus(Request $request, $id)
    {
        $Color = Color::find($id);
        $Color->status = !$Color->status; // toggle the status
        $Color->save();

        return response()->json(['message' => 'Status updated successfully']);
    }

}
