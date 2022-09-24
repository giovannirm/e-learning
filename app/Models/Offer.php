<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    // Para aplicar un descuento por porcentaje
    const PERCENTAGE_DISCOUNT = 1;
    // Para aplicar un precio fijo para todos los cursos
    const FIXED_PRICE = 2;
}
