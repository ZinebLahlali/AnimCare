<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::where('user_id', Auth::user()->id)->get();

         return view('owner.dashboard', ['animals' => $animals]);

          // return response()->json([
        //     'animals' => $animals,
        // ]);
    }

    
    public function showPetsCard()
    {
        $animaux = Animal::where('user_id', Auth::user()->id)->get();
        return view('owner.pets.index', compact('animaux'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owner.pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnimalRequest $request)
    {    $user_id = Auth::user()->id;
         $path = null;

        if($request->hasFile('image')){
            $path = $request->file('image')->store('images', 'public');
        }

        $animal = Animal::create([
            'name' => $request->name,
            'photo' => $path,
            'species' => $request->species,
            'age' => $request->age,
            'gender' => $request->gender,
            'weight' => $request->weight,
            'user_id' => $user_id,
        ]);
        // return response()->json([
        //     'animal' => $animal,
        // ]);

        return redirect()->route('pets.index');

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

        // return response()->json([
        //     'animal' => $animal,
        // ]);
       
        return view('owner.pets.edit', compact('animal'));
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
             
             if ($request->hasFile('image')) {
                if ($animal->photo) {
                    Storage::disk('public')->delete($animal->photo);
                }

                $path = $request->file('image')->store('images', 'public');
                $animal->photo = $path;
             }        

           $animal->update([
                'name' => $request->name,
                'species' => $request->species,
                'age' => $request->age,
                'gender' => $request->gender,
                'weight' => $request->weight,
           ]);
           
        // return response()->json([
        //     'animal' => $animal,
        // ]);
        
        return redirect()->route('pets.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   $animal = Animal::where('user_id', Auth::user()->id)
                ->where('id', $id)
                ->firstOrFail();

        $animal->delete();

        // return response()->json([
        //     'message' => 'the animal is deleted'
        // ]);

        return redirect()->route('pets.index');
        
    }
}
