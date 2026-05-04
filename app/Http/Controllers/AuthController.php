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
      return view('auth.register');
    }


  //Register
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

      return redirect()->route('admin.dashboard');

   } 
            $user = User::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->password),
               'phoneNum' => $request->phoneNum,
            ]);

   
    //  Auth::login($user);
     
     return redirect()->route('owner.dashboard');
   } 



   public function showLoginForm()
   {
      return view('auth.login');
   }



  // Login 
  public function login(Request $request)
  {
     $credentials = $request->only('email', 'password');

     if(Auth::attempt($credentials)){
        $user = Auth::user();
        if($user->isBanned === 1){

           Auth::logout();
            return redirect('/home')->with('error', 'Your Account is banned');
        }

      return redirect()->route(strtolower(Auth::user()->role).".dashboard");
     }
   return redirect('/login')->with('error', 'invalid credentials. Please try again.');

  }





  // Logout
  public function logout()
  {  auth::logout();
      return redirect()->route('login');

  }


  public function getVet()
  {
    $vet = User::where('role', 'Vet')->first();
    return view('about', compact('vet'));
  }


}

