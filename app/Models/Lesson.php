<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];

    // Relación 1:1
    // Recuperamos la descripción de la lección
    public function description(){
        return $this->hasOne('App\Models\Description');
    }

    // Relación 1:n inversa
    // Recuperamos la sección a la que pertenece la lección
    public function section(){
        return $this->belongsTo('App\Models\Section');
    }

    // Relación 1:n inversa
    // Recuperamos la plataforma a la que pertenece la lección
    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }

    // Relación n:m
    // Recuperamos los usuarios que pertenecen a esa lección
    public function users(){
        return $this->belongsToMany('App\Models\Users');
    }

    // Relación 1:1 polimórfica
    // Recuperamos el único recurso de la lección
    public function resource(){
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    // Relación 1:n polimórfica
    // Recuperamos los comentarios de la lección
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    // Relación 1:n polimórfica
    // Recuperamos las reacciones de la lección
    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}
