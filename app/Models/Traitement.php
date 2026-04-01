<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
    /** @use HasFactory<\Database\Factories\TraitementFactory> */
    use HasFactory;

    protected $fillable = [
        'medication',
        'duration',
        'statut',
        'consultation_id',
    ];
}
