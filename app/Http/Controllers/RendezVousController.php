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
use Illuminate\Http\Request;
use Carbon\Carbon;


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
        ->where('rendez_vous.statut', '!=', 'cancel')
        ->select(
            'rendez_vous.id as id',
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


        $rendezVous = DB::table('rendez_vous')
          ->join('animals', 'rendez_vous.animal_id', '=', 'animals.id')
          ->join('users', 'rendez_vous.user_id', '=', 'users.id')
          ->where('rendez_vous.statut', '=', 'completed')
          ->select(
            'rendez_vous.date',
            'rendez_vous.heure',
            'rendez_vous.statut',
            'animals.name as animal_name',
            'animals.photo as animal_photo'
          )
          ->where('users.id', '=', Auth::user()->id)
          ->get();
                 

        $vet = User::where('role', 'Vet')->first();

        return view('owner.pets.appointment', compact('appointments', 'rendezVous', 'vet'));
        
    }

  
    

    /**
     * Show the form for creating a new resource.
     */
   public function create($id)
    {
     $animal = Animal::findOrFail($id);

     return view('owner.pets.addAppointment', compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRendezVousRequest $request)
    {   $user = Auth::user(); 
        
       if($request->type === 'urgence'){
        return back()->with('error', 'For emergencies, please call the veterinarian directly.')
                     ->withInput();
       }

       $date = \Carbon\Carbon::parse($request->date);

       if($date->isWeekend()){
        return back()->with('error', 'Appointments are not available on weekends except emergencies.')
                     ->withInput();
       }

         
        $animal = Animal::where('id', $request->animal_id)
               ->where('user_id', $user->id)
               ->firstOrFail();
        $exists = RendezVous::where('date', $request->date)
                   ->where('heure', $request->heure)
                   ->exists();
                   
                   
        if($exists) {
            return back()->withErrors([
            'heure' => 'This time is already reserved.'
        ])->withInput();
    }      
        $vet = User::where('role' , 'Vet')->first();

        $rendezvous = RendezVous::create([
            'date' => $request->date,
            'heure' => $request->heure,
            'motif' => $request->motif,
            'user_id' => $user->id,
            'statut' => 'pending', 
            'animal_id' => $animal->id,
            'vet_id' => $vet->id,
            'type' => $request->type
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
        $appoint = RendezVous::findOrFail($request->id);
        $appoint->update([
            'statut' => 'confirmed'
        ]);

        return back();
    }

    public function cancel($id)
    {
        $appoint = RendezVous::findOrFail($id);

        if($appoint->statut === "confirmed" || $appoint->statut === "completed"){
           
          return back()->with('error', 'You can not cancel this appointment');

        } else{
              $appoint->update([
            'statut' => 'cancel'
        ]);

        }
      
        return back()->with('success', 'Appointment cancelled');
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
        $appointments = RendezVous::FindOrFail($id);

        return view('owner.update_appointment', compact('appointments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAppointment(Request $request, $id)
    { 
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'heure' => 'required|date_format:H:i',
            'motif' => 'required|string|min:5|max:255',
        ]);
        $appointments = RendezVous::where('user_id', Auth::user()->id)
                      ->where('id', $id)
                      ->firstOrFail();
                    //   dd($request->all());

        if($appointments->statut !== 'pending'){
            
            return back()->with('error', 'You can not update this appointment');

        }else {
            $appointments->date = $request->date;
            $appointments->heure = $request->heure;
            $appointments->motif = $request->motif;
            $appointments->save();
        }             
        
        return redirect()->route('pets.appointment')->with('success', 'Appointment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { $appointments = RendezVous::where('user_id', Auth::user()->id)
                    ->where('id', $id)
                    ->firstOrFail();
        $appointments->update([
             'statut' => 'cancelled'
        ]);
        
        return back()->with('success', 'Appointment cancelled successfully');

    }
}
