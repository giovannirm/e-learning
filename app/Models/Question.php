<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];
    
    // Relación 1:n
    // Recuperamos las respuestas de la pregunta
    public function answers(){
        return $this->hasMany(Answer::class);
    }

    // Relación 1:n inversa
    // Recuperamos el usuario que ha realizado la pregunta
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relación 1:n polimórfica
    // Recuperamos las reacciones de las preguntas
    public function reactions(){
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
