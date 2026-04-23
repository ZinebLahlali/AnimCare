<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Animal;
use App\Models\User;
use App\Http\Requests\StoreRendezVousRequest;
use App\Http\Requests\UpdateRendezVousRequest;
use App\Http\Requests\UpdateRendezVousStatusRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RendezVousNotification;
use Illuminate\Support\Facades\Notification;


class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $appointments = DB::table('rendez_vous')
        ->join('animals', 'rendez_vous.animal_id', '=', 'animals.id')
        ->join('users', 'users.id', '=', 'animals.user_id')
        ->select(
            'rendez_vous.date',
            'rendez_vous.heure',
            'rendez_vous.statut',
            'rendez_vous.motif',
            'animals.photo as animal_photo',
            'animals.name as animal_name',
            'users.id as user_id',
            'users.name as user_name' 
           )
        ->where('users.id', '=', Auth::user()->id)
        ->get();

        return view('owner.pets.appointment', compact('appointments'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create($id)
    {
     $animal = Animal::findOrFail($id);

     return view('owner.pets.test', compact('animal'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRendezVousRequest $request)
    {   $user = Auth::user(); 
        $animal = Animal::where('id', $request->animal_id)
               ->where('user_id', $user->id)
               ->firstOrFail();
        $exists = RendezVous::where('date', $request->date)
                   ->where('heure', $request->heure)
                   ->exists();
                   
        if ($exists) {
            return back()->withErrors([
            'heure' => 'This time is already reserved.'
        ])->withInput();
    }      
        $rendezvous = RendezVous::create([
            'date' => $request->date,
            'heure' => $request->heure,
            'motif' => $request->motif,
            'user_id' => $user->id,
            'statut' => 'pending', 
            'animal_id' => $animal->id
        ]);

        $vet = User::where('role', 'Vet')->firstOrFail();
        $content = "Le client {$user->name} souhaite un rendez-vous pour son animal {$animal->name}.";
        Notification::send($vet, new RendezVousNotification($user->name, $content, $rendezvous->id));

        return redirect()->route('pets.appointment');
    }

    /**
     * Display the specified resource.
     */

    public function accept(UpdateRendezVousStatusRequest $request)
    {
      
        $rdv = RendezVous::findOrFail($request->id);
        $rdv->update([
            'statut' => 'confirmed'
        ]);

        return back();
    }

    public function cancel(UpdateRendezVousStatusRequest $request)
    {
        $rdv = RendezVous::findOrFail($request->id);
        $rdv->update([
            'statut' => 'cancel'
        ]);
        return back();
    }








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
        
        return redirect('/pets/appointment')->with('success', 'Appointment updated successfully');
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
        
        return redirect('/pets/appointment')->with('success', 'Appointment cancelled successfully');

    }
}
