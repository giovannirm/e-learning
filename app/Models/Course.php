<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Habilitamos asignación masiva
    // Protegemos el status porque sino el profesor podría agregar un input con el campo status y modificar su status de publicación
    protected $guarded = ['id', 'status'];
    // Para saber la cantidad de alumnos matriculados por curso
    // Para saber si un curso tiene calificaciones
    protected $withCount = ['students', 'reviews'];

    // Indicará el estado inicial al crear un curso
    const ERASER = 1;
    // Indicará el estado en revisión cuando se verifique si el curso es válido
    const REVISION = 2;
    // Cuando el curso ha sido publicado y ha pasado todas las pruebas de calidad
    const PUBLISHED = 3;

    // Para agregar un atributo a un modelo
    public function getRatingAttribute()
    {
        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'), 1);
        } else {
            // Si no se ha ingresado calificación alguna en un curso, este debería tener 5 estrellas
            return 5;
        }
    }

    // Query Scopes
    public function scopeCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id)
    {
        if ($level_id) {
            return $query->where('level_id', $level_id);
        }
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    // Relación 1:n
    // Recuperamos los cupones que se han generado en el curso
    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    // Relación 1:n
    // Recuperamos las calificaciones que se han realizado en el curso
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Relación 1:n
    // Recuperamos los requerimientos del curso
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    // Relación 1:n
    // Recuperamos las metas del curso
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    // Relación 1:n
    // Recuperamos las secciones del curso
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    // Relación 1:n inversa de usuario profesor
    // Recuperamos el docente que imparte el curso
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación 1:n inversa
    // Recuperamos el nivel que mantiene el curso
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // Relación 1:n inversa
    // Recuperamos la categoría que mantiene el curso
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación 1:n inversa
    // Recuperamos el precio que mantiene el curso
    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    // Relación n:m de usuario alumno
    // Recuperamos los estudiantes que pertenecen al curso
    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    // Relación n:m
    // Recuperamos las compras donde se encuentra el mismo curso
    public function purchases()
    {
        return $this->belongsToMany(Purchase::class);
    }

    // Relación 1:1 polimórfica
    // Recuperamos la única imagen que tiene un curso
    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // Relación 1:n polimórfica
    // Recuperamos las reacciones del curso
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }

    // hasManyThrough(modelo lesson, modelo de la tabla intermedia)
    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Section::class);
    }
}
