<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];
    
    // Relación 1:n inversa
    // Recuperamos el curso al que pertenece la sección
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}
