<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RendezVousController;
use App\Models\Animal;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/register', function(){
    return response()->json(@csrf_token());
});

Route::get('/login', function(){
    return response()->json(@csrf_token());
});

// Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', [AnimalController::class, 'index']);
    Route::get('/animals/create', [AnimalController::class, 'create']);
    Route::post('/animals', [AnimalController::class, 'store']);
    Route::get('/animals/{id}/edit', [AnimalController::class, 'edit']);
    Route::put('/animals/{id}', [AnimalController::class, 'update']);
    Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);
});

Route::post('/rendezvous', [RendezVousController::class, 'store']);
