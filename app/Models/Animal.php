<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animal extends Model
{
    /** @use HasFactory<\Database\Factories\AnimalFactory> */
    use HasFactory;
   protected $fillable = [
    'name',
    'photo',
    'species',
    'age',
    'gender',
    'weight',
    'user_id',
   ];

   public function user(): BelongsTo
   {
     return $this->belongsTo(User::class);
   }

   public function rendezvouses(): HasMany
   {
     return $this->hasMany(RendezVous::class);
   }

}
