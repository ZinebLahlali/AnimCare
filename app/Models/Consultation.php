<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    /** @use HasFactory<\Database\Factories\ConsultationFactory> */
    use HasFactory;
    protected $fillable = [
        'symptomes',
        'diagnostic',
        'poids',
        'temperature',
        'date_consultation',
        'rendezVous_id',
    ];
}
