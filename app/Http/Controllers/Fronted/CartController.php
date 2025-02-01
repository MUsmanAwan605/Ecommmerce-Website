<?php

namespace App\Http\Controllers\Fronted;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   public function CardPage()
   {
    $Carts=Cart::where('user_id',Auth::id())->get();

    if($Carts->count()>0){

        return view('frontend.cart.index',compact('Carts'));
    }
    else{
        return view('frontend.cart.empty');
    }
    }




    public function Cart(Request $request, $id)
    {
        // Check if the user is authenticated
        if (Auth::id()) {
            $user = auth()->user();
            $product = Product::find($id);


            $existingCartItem = Cart::where('user_id', $user->id)
                                    ->where('prod_title', $product->prod)
                                    ->first();

            if ($existingCartItem) {
                // If the product is already in the cart, update the quantity
                $existingCartItem->qty += $request->input('qty', 1); // Increment the quantity
                $existingCartItem->price = $existingCartItem->qty * $existingCartItem->price; // Update the total
                $existingCartItem->save();
            } else {
                // Create a new cart entry if the product is not already in the cart
                $cart = new Cart;
                $cart->user_id = $user->id;
                $cart->name = $user->fname;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->prod_title = $product->prod;
                $cart->prod_img= $product->prod_img;
                $cart->price = $product->selling_price;
                $cart->qty = $request->input('qty', 1);
                $cart->total = $cart->qty * $cart->price;
                $cart->save();
            }

            // Redirect to cart page with success message
            return redirect()->route('cart.page')->with('success', 'Product added to cart successfully!');
        } else {
            // Redirect to login page if user is not authenticated
            return redirect('login')->with('message', 'Please register or log in to add items to your cart.');
        }
    }

    public function DeleteCartData($id)
    {


        if (Auth::check()) {
            $user = auth()->user();
            $cartItem = Cart::where('user_id', $user->id)->first();

            if ($cartItem) {
                $cartItem->delete(); // Delete the cart item
                return redirect()->back()->with('success', 'Product removed from cart');
            } else {
                return redirect()->back()->with('error', 'Cart item not found');
            }
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to delete a cart item');
        }

    }



    public function destroy($id)
    {
        Cart::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->route('cart.page')->with('success', 'Product removed from cart!');
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('cart.page')->with('success', 'Cart cleared!');
    }

}
