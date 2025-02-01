<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
{
    view()->composer('*', function ($view) {
        if (Auth::check()) {
            $user = auth()->user();
            $cartItems = Cart::where('user_id', $user->id)->get();
            $cartCount = $cartItems->sum('qty');
            $categories=Category::where('status','active')->get();
            $products=Product::where('status','active')->get();
            $view->with([
                'cartItems' => $cartItems,
                'cartCount' => $cartCount,
                'categories' => $categories,
                'products' => $products
            ]);
        }
    });
}

}
