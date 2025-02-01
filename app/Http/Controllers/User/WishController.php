<?php

namespace App\Http\Controllers\User;

use App\Models\Wish;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishController extends Controller
{

    function WishPage(){


        $Wishlists=Wish::where('user_id',Auth::id())->get();
        if($Wishlists->count()>0){
            return view('frontend.wish.index',compact('Wishlists'));
        }
        else{
            return view('frontend.wish.empty');

        }

    }
    public function Wish($id){
        if(Auth::check()){
            $user=auth()->user();
            $product=Product::find($id);

            // Create a New Wish List
            $wishlist=new Wish;
            $wishlist->user_id = $user->id ;
            $wishlist->name = $user->fname ;
            $wishlist->prod_title = $product->prod ;
            $wishlist->prod_img = $product->prod_img ;
            $wishlist->price = $product->selling_price ;
            $wishlist->save();
            return redirect()->route('wish.page',$id)->with('success', 'Product added to cart successfully!');

        }

        else{
            return redirect('login')->with('message', 'Please register or log in to add items to your cart.');

        }
    }
}
