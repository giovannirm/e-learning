<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];

    // Creamos el método para realizar la relación polimórfica
    public function commentable(){
        return $this->morphTo();
    }

    // Relación 1:n inversa
    // Recuperamos el usuario al que pertenece el comentario
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Relación 1:n polimórfica
    // Recuperamos los comentarios de los comentarios
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    // Relación 1:n polimórfica
    // Recuperamos las reacciones de los comentarios
    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}
