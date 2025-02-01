<?php

namespace App\Http\Controllers\Fronted;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;

class FrontedHomeController extends Controller
{
    public function home()
    {
        $categories = Category::where('status','Active')->get();
        $products = Product::where('status','active')->get();
        $Sales = FlashSale::where('status','active')->get();
        $sliders = Slider::all();

        return view('frontend.home', compact('categories', 'products','sliders','Sales'));
    }

public function ProductDetail($id)  {

    $Product = Product::findOrFail($id);
    return view('frontend.product.show', compact('Product'));

}

}
