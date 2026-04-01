<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Animal;
use App\Http\Requests\StoreRendezVousRequest;
use App\Http\Requests\UpdateRendezVousRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RendezVousNotification;


class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $rendezVous = DB::table('rendez_vous')
        ->join('animals', 'rendez_vous.animal_id', '=', 'animals.id')
        ->join('users', 'users.id', '=', 'animals.user_id')
        ->select('animals.name', 'rendez_vous.date', 'rendez_vous.heure', 'rendez_vous.statut', 'users.id')
        ->where('users.id', '=', Auth::user()->id)
        ->get();

        return response()->json([
             'rendezVous' => $rendezVous,
        ]);

        // return view('rendezVous.index', compact('rendezVous'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rendezvous.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRendezVousRequest $request)
    {    $animal = Animal::where('id', $request->animal_id)
               ->where('user_id', Auth::user()->id)
               ->firstOrFail();
        $rendezvous = RendezVous::create([
            'date' => $request->date,
            'heure' => $request->heure,
            'notif' => $request->notif,
            'statut' => 'pending', 
            'animal_id' => $animal->id
        ]);

        return response()->json([
            'rendezvous' => $rendezvous
        ]);

        // return redirect('/rendezvous')->with('success', 'Appointment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RendezVous $rendezVous)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rendezvous = RendezVous::FindOrFail($id);

        return view('rendezvous.edit', compact('rendezvous'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRendezVousRequest $request, $id)
    {   $rendezvous = RendezVous::where('user_id', Auth::user()->id)
                      ->where('id', $id)
                      ->firstOrFail();
        $rendezvous->update([
            'date' => $request->date,
            'heure' => $request->heure,
            'motif' => $request->motif
        ]); 
        
        return redirect('/dashboard')->with('success', 'Appointment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { $rendezvous = RendezVous::where('user_id', Auth::user()->id)
                    ->where('id', $id)
                    ->firstOrFail();
        $rendezvous->update([
             'statut' => 'cancelled'
        ]);
        
        return redirect('/dashboard')->with('success', 'Appointment cancelled successfully');

    }
}
