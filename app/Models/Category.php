<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];

    // Recuperamos los cursos que mantiene una categoría
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
}
