<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Sliders=Slider::orderBy('id', 'asc')->paginate('5');
        return view('admin.slider.index',compact('Sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');

    }

    /**
     * Store a newly created resource in storage.
     */




        public function store(Request $request)
        {
            // // Validate the input fields
            // $request->validate([
            //     'Discount' => 'required|numeric',
            //     'Offer' => 'required|string|max:255',
            //     'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate each image
            // ]);




            // // Handle multiple image uploads
            if (request()->hasFile('file')) {
                $file = request()->file('file');
                $filename = md5($file->getClientOriginalName()).time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/slider_img'), $filename);
            } else {
                $filename = 'Image will be here';

            }

            // Create a new slider record (if you expect multiple images, consider storing as JSON or using a relationship)
            Slider::create([
                'discount' => $request->get('Discount'),
                'heading' => $request->get('Offer'),
                'img' => $filename // Store filenames as JSON
            ]);

            return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully.');
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
        $Slider=Slider::find($id);
        return view('admin.slider.edit',compact('Slider'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            // Validate the input fields
            // $request->validate([
            //     'Discount' => 'required|numeric',
            //     'Offer' => 'required|string|max:255',
            //     'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate each image
            // ]);




            // // Handle multiple image uploads
            $slider=Slider::find($id);
            if (request()->hasFile('file')) {
                $file = request()->file('file');
                $filename = md5($file->getClientOriginalName()).time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/slider_img'), $filename);
            } else {
                $filename = 'Image will be here';

            }



            // Create a new slider record (if you expect multiple images, consider storing as JSON or using a relationship)
            $slider->update([
                'discount' => $request->get('Discount'),
                'heading' => $request->get('Offer'),
                'img' => $filename // Store filenames as JSON
            ]);

            return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully.');
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Slider=Slider::find($id);
        $Slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider Delete successfully.');

    }
}
