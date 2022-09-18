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
        return $this->hasOne('App\Models\Profile');
    }

    // Relación 1:n de usuario profesor
    // Recuperamos los cursos dictados por el usuario profesor
    public function courses_dictated(){
        return $this->hasMany('App\Models\Course');
    }

    // Relación 1:n
    // Recuperamos las calificaciones que ha realizado algún usuario
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    // Relación 1:n
    // Recuperamos los comentarios que ha realizado algún usuario
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    // Relación 1:n
    // Recuperamos las reacciones que ha realizado algún usuario
    public function reactions(){
        return $this->hasMany('App\Models\Reaction');
    }

    // Relación n:m de usuario alumno
    // Recuperamos los cursos matriculados por el usuario alumno
    public function courses_enrolled(){
        return $this->belongsToMany('App\Models\Course');
    }

    // Relación n:m
    // Recuperamos las lecciones del usuario
    public function lessons(){
        return $this->belongsToMany('App\Models\Lesson');
    }
}
