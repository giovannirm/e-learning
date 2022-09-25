<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];
    
    // Relación n:m
    // Recuperamos los perfiles que mantienen una misma red social
    public function profiles(){
        return $this->belongsToMany(Profile::class);
    }
}
