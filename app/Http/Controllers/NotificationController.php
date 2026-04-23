<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RendezVousNotification;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->notifications()->latest()->get();
        $appointments = DB::table('rendez_vous')
        ->join('animals', 'rendez_vous.animal_id', '=', 'animals.id')
        ->join('users', 'users.id', '=', 'animals.user_id')
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
        ->get();

       return view('vet.appointment', ['appointments' => $appointments,'notifications' => $notifications]);    

    }

    public function dashboardStats()
    {   $todayAppointments = DB::table('rendez_vous')
                ->whereDate('date', Carbon::today())
                ->where('statut', 'confirmed')
                ->get();

        $weekAppointments = DB::table('rendez_vous')
               ->whereBetween('date', [ Carbon::now()->startOfWeek(),
               Carbon::now()->endOfWeek()
               ])  
               ->where('statut', 'confirmed')
               ->get();
               
        $monthAppointments = DB::table('rendez_vous')
                ->whereMonth('date', Carbon::now()->month)
                ->whereYear('date', Carbon::now()->year)
                ->where('statut', 'confirmed')
                ->get();
         
        $enCours = DB::table('rendez_vous')
                 ->where('statut', 'confirmed')
                 ->count();      
         
        $enAttente = DB::table('rendez_vous')
                   ->where('statut', 'pending')
                   ->count();

        
        $termine = DB::table('rendez_vous')
                  ->where('statut', 'completed')
                  ->count();

         return view('vet.dashboard', compact(
            'todayAppointments',
            'weekAppointments',
            'monthAppointments',
            'enCours',
            'enAttente',
            'termine'
         ));       

    }


}
