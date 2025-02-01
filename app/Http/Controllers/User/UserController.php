<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{
    public function UserDashboard(){
        $Carts=Cart::where('user_id', Auth::id())->get();

        return view('dashboard',compact('Carts'));
        }

        // -- Admin Login --
        public function UserLogin(){
            return view('auth.login');
        }

        // Admin Logout //
        public function UserLogout(Request $request): RedirectResponse{
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/user/login');
        }
    }

