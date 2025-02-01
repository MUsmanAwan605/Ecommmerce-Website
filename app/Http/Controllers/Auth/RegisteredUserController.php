<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'digits:11'],
            'address' => ['required', 'max:255'],
        ]);

          // Handle the image upload
          if (request()->hasFile('images')) {
            $file = request()->file('images');
            $filename = md5($file->getClientOriginalName()).time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/category_img'), $filename);
        } else {
            $filename = 'Image will be here';
        }
              $user = User::create([
            'fname' => $request->FirstName,
            'lname' => $request->LastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'country' => $request->Country,
            'address' => $request->address,
            'u_image' => $filename,
        ]);



        event(new Registered($user));

        Auth::login($user);

        return redirect('/user/dashboard');
    }
}
