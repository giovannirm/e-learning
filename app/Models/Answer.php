<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];

    // Relación 1:n inversa
    // Recuperamos la pregunta a la que hace referencia la respuesta
    public function question(){
        return $this->belongsTo(Question::class);
    }

    // Relación 1:n inversa
    // Recuperamos el usuario que realiza la respuesta
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relación 1:n polimórfica
    // Recuperamos las reacciones de las respuestas
    public function reactions(){
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
