<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];
    
    // Relación 1:n
    // Recuperamos las lecciones que pertenecen a la plataforma
    public function lesson(){
        return $this->hasMany(Lesson::class);
    }
}
