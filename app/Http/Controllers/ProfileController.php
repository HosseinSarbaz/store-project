<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $addresses = address::where('user_id', auth()->id() )->get();
        return view("Home.profile",compact("addresses"));
    }

    public function update(Request $request){

        $user = auth()->user();

        $dataform = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email',
            'phone' => 'nullable|numeric',
            'gender' => 'nullable|in:male,female',
            'birth_day' =>  'nullable|string'
        ]);

        $user->update($dataform);

        return redirect()->route('Home.Profile');
    }



}
