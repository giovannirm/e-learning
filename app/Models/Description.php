<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];
    
    // Relación 1:1 inversa
    // Recuperamos la lección a la que pertenece la descripción
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
