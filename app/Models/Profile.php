<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];
    
    // Relación 1:1 inversa
    // Recuperamos el usuario que mantiene un perfil
    public function user(){
        return $this->belongsTo(User::class);
    }

}
