<?php

namespace App\Http\Controllers\Fronted;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;

class FrontedProductController extends Controller
{
    public function product(Request $request)
    {
        // Fetch all categories to display in the checkboxes
        $categories = Category::all();
        $colors=Color::all();

        // Fetch selected category IDs from the query parameters (if any)
        $categoryIds = $request->query('categories', []);
        $colorsIds = $request->query('colors', []);

        // If no categories are selected, show all products
        if (empty($categoryIds)) {
            $products = Product::where('status', operator: 'Active')->get();
        } else {
            // If categories are selected, filter products based on the selected categories
            $products = Product::whereHas('category', function ($query) use ($categoryIds) {
                $query->whereIn('category_id', $categoryIds);
            })->where('status', 'Active')->get();
        }

        // Return the view with categories and filtered products
        return view('frontend.product', compact('colorsIds','colors','categories', 'products', 'categoryIds'));
    }

    // This method will handle the filter form submission
    public function filterByCategories(Request $request)
    {
        // Fetch selected category IDs from the request (checkbox form submission)
        $categoryIds = $request->input('categories', []);

        // If no categories are selected, show all products
        if (empty($categoryIds)) {
            $products = Product::where('status', 'Active')->get();
        } else {
            // Filter products based on the selected categories
            $products = Product::whereHas('category', function ($query) use ($categoryIds) {
                $query->whereIn('category_id', $categoryIds);
            })->where('status', 'Active')->get();
        }


        $categories = Category::all();


        return view('frontend.product', compact('categories', 'products', 'categoryIds'));
    }

    function ColorFilter(Request $request) {
        $colorsIds = $request->query('colors', []);

$Product=Product::with('product_colors');

if(!empty($colorsIds)){
    $Products=$Product->whereHas('product_colors',function($query) use ($colorsIds){
        $query->whereIn('color_id', $colorsIds);
    });
}

$Products = $Product->get();

// $product_color = $Product->product_colors->pluck('color_id')->flatten()->toArray();
$product_color = $Products->pluck('product_colors.*.color_id')->flatten()->toArray();
// $product_color =  $Product->product_colors->pluck('color_id')->toArray();

$Colors = Color::whereNotIn('id', $product_color)->get();
$categories = Category::all();

dd($Colors, $categories);
// return view('frontend.product', compact('colorsIds', 'Colors', 'Products','categories'));


    }

}

// $product_color =  $Product->product_colors->pluck('color_id')->toArray();
//     $Colors = Color::whereNotIn('id', $product_color)->get();
