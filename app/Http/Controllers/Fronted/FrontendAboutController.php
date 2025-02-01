<?php

namespace App\Http\Controllers\Fronted;

use App\Models\About;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendAboutController extends Controller
{
    function about()   {

        $about=About::first();
        return view('frontend.about', compact('about'));
    }
}
