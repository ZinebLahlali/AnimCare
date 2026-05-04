<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{   
    public function total()
    {
        $totalOwner = User::where('role', 'Owner')->count();
        $totalVet = User::where('role', 'Vet')->count();
        $totalAnimals = Animal::count();
        $vet = User::where('role', 'Vet')->first();
        $user = User::latest()
        ->where('role', 'Owner')
        ->first();
        $animal = $user->animals()->latest()->first();

        return view('admin.dashboard', compact('totalOwner', 'totalVet', 'totalAnimals', 'vet', 'user', 'animal'));

    }

    public function toggelBan($id)
    {
        $user = User::findOrFail($id);

        if($user->role === 'Admin'){
            return back();
        } 

        $user->isBanned = !$user->isBanned;
        $user->save();


        return back();
    }


    public function getAllUsers()
    {
        $users = DB::table('users')
        ->join('animals', 'users.id', '=', 'animals.user_id')
        ->select( 'users.id',
                  'users.name as user_name',
                  'users.email as email',
                  'users.phoneNum as phoneNum',
                  'users.isBanned',
                  DB::raw('COUNT(animals.id) as animals_count')
                  )
        ->where('users.role', '=', 'Owner')          
        ->groupBy('users.id',
                  'users.name',
                  'users.email',
                  'users.phoneNum',
                  'users.isBanned')      
        ->get();   
        
        return view('admin.users', compact('users'));
    }

    public function singinForm()
    {
        return view('admin.singin');
    }

   

   

 


}
