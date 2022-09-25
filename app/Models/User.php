<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Relación 1:1
    // Recuperamos el perfil del usuario profesor
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    // Relación 1:n de usuario profesor
    // Recuperamos los cursos dictados por el usuario profesor
    public function courses_dictated(){
        return $this->hasMany(Course::class);
    }

    // Relación 1:n
    // Recuperamos las preguntas que ha realizado un usuario
    public function questions(){
        return $this->hasMany(Question::class);
    }

    // Relación 1:n
    // Recuperamos las respuestas que ha realizado un usuario
    public function answers(){
        return $this->hasMany(Answer::class);
    }

    // Relación 1:n
    // Recuperamos las ofertas que ha realizado un usuario administrador
    public function offers(){
        return $this->hasMany(Offer::class);
    }

    // Relación 1:n
    // Recuperamos las compras que ha realizado un usuario alumno
    public function purchases(){
        return $this->hasMany(Purchase::class);
    }

    // Relación 1:n
    // Recuperamos las calificaciones que ha realizado un usuario
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    // Relación 1:n
    // Recuperamos los comentarios que ha realizado un usuario
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // Relación 1:n
    // Recuperamos las reacciones que ha realizado un usuario
    public function reactions(){
        return $this->hasMany(Reaction::class);
    }

    // Relación n:m de usuario alumno
    // Recuperamos los cursos matriculados por el usuario alumno
    public function courses_enrolled(){
        return $this->belongsToMany(Course::class);
    }

    // Relación n:m
    // Recuperamos las lecciones que debe realizar el usuario
    public function lessons(){
        return $this->belongsToMany(Lesson::class);
    }
}
