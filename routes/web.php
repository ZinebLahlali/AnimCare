<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RendezVousController;
use App\Models\Animal;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/home');
Route::get('/home', function(){
    return view('home');
});

Route::get('/about', [AuthController::class, 'getVet']);

// Route::get('/owner/dashboard', function (){
//     return view('owner.dashboard');
// })->name('owner.dashboard');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route::get('/register', function(){
//     return response()->json(@csrf_token());
// });

// Route::get('/login', function(){
//     return response()->json(@csrf_token());
// });

Route::get('/owner/pets', function (){
    return view('owner.pets.index');
})->name('pets.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// route owner
Route::middleware(['auth'])->group(function (){

    Route::get('/owner/dashboard', [AnimalController::class, 'index'])->name('owner.dashboard');
    Route::get('owner/pets', [AnimalController::class, 'showPetsCard'])->name('pets.index');
    Route::get('/owner/pets/create', [AnimalController::class, 'create'])->name('pets.create');
    Route::post('/pets', [AnimalController::class, 'store'])->name('pets.store');
    Route::get('/pets/{id}/edit', [AnimalController::class, 'edit'])->name('pets.edit');
    Route::put('/pets/{id}', [AnimalController::class, 'update'])->name('pets.update');
    Route::delete('owner/pets/{id}', [AnimalController::class, 'destroy'])->name('pets.delete');


    Route::get('/pets/appointment', [RendezVousController::class, 'index'])->name('pets.appointment');
    Route::get('/appointment/create/{id}', [RendezVousController::class, 'create'])->name('pets.addAppointment');
    Route::post('/pets/appointment', [RendezVousController::class, 'store'])->name('pets.rendezvous');
    Route::get('/appointment/{id}/edit', [RendezVousController::class, 'edit'])->name('update_appointment');
    Route::put('/appointment/{id}/update', [RendezVousController::class, 'updateAppointment'])->name('update.appointment');
    Route::put('/appointment/cancel/{id}', [RendezVousController::class, 'cancel'])->name('cancel.appointment');
});



Route::prefix('vet')->group(function () {
    
    Route::get('/dashboard', [NotificationController::class, 'dashboardStats'])->name('vet.dashboard');
    Route::get('/appointment', [NotificationController::class, 'index'])->name('vet.appointment');
    Route::post('/dashboard/accept-appointement', [RendezVousController::class, 'accept'])->name('appointments.accept');
    Route::post('/dashboard/cancel-appointement', [RendezVousController::class, 'cancel'])->name('appointments.cancel');


});
// Profile 
Route::get('/profile', [ProfileController::class, 'editUser'])->name('profile.edit');
Route::put('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');


// route Admin
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'total'])->name('admin.dashboard');
    Route::put('/user/ban/{id}', [AdminController::class, 'toggelBan'])->name('user.ban');
    Route::get('/users', [AdminController::class, 'getAllUsers'])->name('admin.users');
    Route::post('/singin', [AuthController::class, 'register'])->name('admin.singin');
    Route::get('/singin', [AdminController::class, 'singinForm']);
});

