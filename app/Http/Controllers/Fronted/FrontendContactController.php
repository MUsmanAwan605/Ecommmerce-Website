<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendContactController extends Controller
{
    function contact() {
        return view('frontend.contact');
    }
}
