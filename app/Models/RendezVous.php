<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RendezVous extends Model
{
    /** @use HasFactory<\Database\Factories\RendezVousFactory> */
    use HasFactory;
    protected $table = 'rendez_vous';
    protected $fillable = [
       'date',
       'heure',
       'motif',
       'statut',
       'user_id',
       'animal_id',
       'vet_id'
    ];

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    public function vet()
   {
    return $this->belongsTo(User::class, 'vet_id');
   }

   
}
