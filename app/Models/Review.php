<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    // Habilitamos asignación masiva
    protected $guarded = ['id'];

    // const HLIGHTED = 1;
    // const OVERSHADOWED = 2;

    const REPORTING_LIMIT = 0;
    
    // Relación 1:n inversa
    // Recuperamos el usuario que ha realizado una calificación
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relación 1:n inversa
    // Recuperamos el curso que ha recibido una calificación
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
