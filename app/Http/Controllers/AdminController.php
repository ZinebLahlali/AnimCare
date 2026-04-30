<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{   
    public function total()
    {
        $totalOwner = User::where('role', 'Owner')->count();
        $totalVet = User::where('role', 'Vet')->count();
        $totalAnimals = Animal::count();

        return view('admin.dashboard', compact('totalOwner', 'totalVet', 'totalAnimals'));

    }

   

 


}
