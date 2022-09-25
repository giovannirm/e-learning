<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    protected $guarded = ['id'];
    
    // Para aplicar un descuento por porcentaje
    const PERCENTAGE_DISCOUNT = 1;
    // Para aplicar un precio fijo para todos los cursos
    const FIXED_PRICE = 2;

    // Relación 1:n inversa
    // Recuperamos el usuario que la oferta
    public function user(){
        return $this->belongsTo(User::class);
    }
}
