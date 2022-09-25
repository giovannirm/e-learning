<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];
    
    // Relación 1:n inversa
    // Recuperamos el usuario que ha realizado la compra
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relación n:m
    // Recuperamos los cursos que han sido comprados
    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}
