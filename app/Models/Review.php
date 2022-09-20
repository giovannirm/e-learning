<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];
    
    // Relación 1:1 inversa
    // Recuperamos el usuario que ha realizado alguna calificación
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relación 1:1 inversa
    // Recuperamos el curso que ha recibido alguna calificación
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
