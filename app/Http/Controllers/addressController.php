<?php

namespace App\Http\Controllers;

use App\Models\address;
use Illuminate\Http\Request;

class addressController extends Controller
{
    public function addAddressForm(){
        return view("Home.addAddress");
    }

    public function addAddress(Request $request){

        $dataform = $request->validate([
            'city' => 'required|string|max:55',
            'postal_code' => 'required|numeric',
            'address' => 'required|string|max:1024'
        ]);

        $dataform['user_id'] = auth()->user()->id;

        address::create($dataform);

        return redirect()->route('Home.Profile');

    }

    public function editAddressForm(){
        $addresses = address::where('user_id', auth()->id() )->first();
        return view("Home.editAddress",compact("addresses"));
    }

    public function editAddress(Request $request,$id){
        $address = address::findOrFail($id);

        $dataform = $request->validate([
            'city' => 'nullable|string|max:55',
            'postal_code' => 'nullable|numeric',
            'address' => 'nullable|string|max:1024'
        ]);

        $address->update($dataform);
        return redirect()->route('Home.Profile');
    }

    public function deleteAddress($id){
        $address = address::findOrFail($id);
        $address->delete();

        return redirect()->route('Home.Profile');
    }

}
