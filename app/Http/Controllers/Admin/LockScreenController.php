<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LockScreenController extends Controller
{


    public function  showLockScreen(){

        $currentTime = Carbon::now()->format('h:i A');
        $currentDate = Carbon::now()->format('j F Y');

        // Define the user role dynamically (e.g., from the session or database)
        // $userRole = 'Administrator';
        $auth=User::all();
            return view('auth.lockscreen',compact('auth','currentTime','currentDate')); // Lock screen ka view


    }

    public function unlock(Request $request)
    {
        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            if ($user->user_role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->user_role === 'user') {
                return redirect()->route('user.dashboard');
            }
        } else {
            // Handle invalid password case
            return view('auth.errors');
        }


    }}

