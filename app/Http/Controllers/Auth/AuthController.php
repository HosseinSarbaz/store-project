<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm(){
        return view("Auth.register");
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:8|confirmed'
        ],
        [
            'email.unique' => 'این ایمیل از قبل وجود دارد',
            'username.unique' => 'این نام کاربری قبلا انتخاب شده است',
        ]
    );


        $password = Hash::make($validated['password']);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => $password,
            'role' => 'user'

        ]);




        return response()->json([
            'status' => 'ok',
            'message' => 'کاربر با موفقیت ساخته شد',
            'user' => $user,
        ]);



    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        $user = User::where('email',$validated['email'])->first();

        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'ایمیل وارد شده اشتباه است',
            ],401);
        }

        if(!Hash::check($validated['password'],$user->password) ){
            return response()->json([
                'status' => 'error',
                'message' => 'رمز اشتباه است',
            ],401);
        }


        Auth::login($user);

        return response()->json([
            'status' => 'ok',
            'message' => 'ورود با موفقیت انجام شد',
            'user' => $user
        ]);

        
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('Home.index');

    }

}
