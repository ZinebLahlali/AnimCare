<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use League\Uri\Http;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
      //   return view('auth.register');
    }

   public function register(StoreAuthRequest $request)
   {  $authuser = auth::user();
    if($authuser && $authuser->role == 'Admin'){

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => "Vet",
        'specialite' => $request->specialite,
        'fix' => $request->fix,
      ]);
   } else{
            $user = User::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->password),
               'phoneNum' => $request->phoneNum,
            ]);

   }
  
    return response()->json(['user' => $user], 201);
     
    //  return redirect('/dashboard/owner')->with('success', 'Registration successful! Please log in.');
   } 


   public function showLoginForm()
   {
      // return view('auth.login');
   }

  public function login(Request $request)
  {
     $credentials = $request->only('email', 'password');

     if(Auth::attempt($credentials)){
      //   return redirect()->intended('/');
      return response()->json([
         $credentials,
      ]);
     }
   // return redirect('/login')->with('error', 'invalid credentials. Please try again.');

  }
 
  public function logout(StoreAuthRequest $request)
  {  auth::logout();
     return redirect('/login');

  }


}

