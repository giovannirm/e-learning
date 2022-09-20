<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];
    
    // Relación 1:n
    // Recuperamos los cursos que mantiene un nivel
    public function courses(){
        return $this->hasMany(Course::class);
    }
}
