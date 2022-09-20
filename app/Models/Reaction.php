<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];
    
    const LIKE = 1;
    const DISKLIKE = 2;

    public function reactionable(){
        return $this->morphTo();
    }

    // Relación 1:n inversa
    // Recuperamos el usuario al que pertenece la reacción
    public function user(){
        return $this->belongsTo(User::class);
    }    
}
