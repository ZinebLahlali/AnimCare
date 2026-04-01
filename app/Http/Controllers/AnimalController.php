<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::where('user_id', Auth::user()->id)->get();

        return response()->json([
            'animals' => $animals,
        ]);
        // return view('animals.index', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnimalRequest $request)
    {    $user_id = Auth::user()->id;
        $path = $request->file('image')->store('images', 'public');
        $animal = Animal::create([
            'name' => $request->name,
            'photo' => $path,
            'species' => $request->species,
            'age' => $request->age,
            'gender' => $request->gender,
            'weight' => $request->weight,
            'user_id' => $user_id,
        ]);
        return response()->json([
            'animal' => $animal,
        ]);

        //  return redirect('/animals')->with('success', 'Animal added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {    
        $animal = Animal::findOrFail($id);

        return response()->json([
            'animal' => $animal,
        ]);
       
        return view('animals.edit', compact('animal'));
    }

    // public function edit(Animal $animal)
    // {
    //     return view('animal.edit', compact('animal'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnimalRequest $request, $id)
    {  $animal = Animal::where('user_id', Auth::user()->id)
                     ->where('id', $id)
                     ->firstOrFail();

           $animal->update([
                'name' => $request->name,
                'species' => $request->species,
                'age' => $request->age,
                'gender' => $request->gender,
                'weight' => $request->weight,
           ]);
           
        return response()->json([
            'animal' => $animal,
        ]);
        
        //  return redirect('/dashboard');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   $animal = Animal::where('user_id', Auth::user()->id)
                ->where('id', $id)
                ->firstOrFail();

        $animal->delete();

        return response()->json([
            'message' => 'the animal is deleted'
        ]);

        // return redirect('/dashboard');
        
    }
}
