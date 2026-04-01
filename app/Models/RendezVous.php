<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    /** @use HasFactory<\Database\Factories\RendezVousFactory> */
    use HasFactory;
    protected $fillable = [
       'date',
       'heure',
       'motif',
       'statut',
       'user_id',
       'animal_id',
    ];
}
