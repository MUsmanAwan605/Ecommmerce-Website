<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts=About::orderby('id','desc')->paginate('15');
        return view('admin.aboutus.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.aboutus.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

        ]);

        if (request()->hasFile('first_icon')) {
            $file = request()->file('first_icon');
            $filename1 = md5($file->getClientOriginalName()).time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/brand_img'), $filename1);
        } else {
            $filename1 = 'Image will be here';

        }

        if (request()->hasFile('Second_icon')) {
            $file = request()->file('Second_icon');
            $filename2 = md5($file->getClientOriginalName()).time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/brand_img'), $filename2);
        } else {
            $filename2 = 'Image will be here';

        }

        if (request()->hasFile('Third_icon')) {
            $file = request()->file('Third_icon');
            $filename3 = md5($file->getClientOriginalName()).time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/brand_img'), $filename3);
        } else {
            $filename3 = 'Image will be here';

        }


        About::create([
            'title'=>$request->get('title'),  // Main title like "Know More About Us"
            'main_content'=>$request->get('main_content'), // Main content text
            'pt_one'=>$request->get('PointOne'),
            'pt_sec'=>$request->get('PointSecond'),
            'pt_trd'=>$request->get('PointThird'),
            'frt_icon'=>$filename1,
            'frt_title'=>$request->get('first_title'),
            'frt_content'=>$request->get('first_content'),
            'sec_icon'=>$filename2,
           'sec_title'=>$request->get('Second_title'),
            'sec_content'=>$request->get('Second_content'),
           'trd_icon'=>$filename3,
            'trd_title'=>$request->get('Third_Title'),
            'trd_content'=>$request->get('Third_Content'),

        ]);

        return redirect()->route('admin.about.index');



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
