<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function editUser(){
        $user = Auth::user();
        return view('profile', compact('user'));

    }


    public function updateProfile(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'phoneNum' => 'sometimes|string|min:10|max:14',
            'specialite' => 'sometimes|string',
            'fix' => 'sometimes|string',
        ]);

        User::Where('id', Auth::user()->id)->update([
        'name' => $request->name,
        'phoneNum' => $request->phoneNum,
        'specialite' => $request->specialite,
        'fix' => $request->fix
       ]);

       return back()->with('success', 'Profile updatde');

    }
   
}
