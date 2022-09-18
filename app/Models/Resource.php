<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];
    
    public function resourceable(){
        return $this->morphTo();
    }
}
