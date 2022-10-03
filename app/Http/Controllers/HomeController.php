<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Traemos los cursos con estatus de publicado
        // latest ordenará de manera descendente según el último curso creado con estatus 3
        $courses = Course::where('status', '3')->latest('id')->get()->take(12);
        return view('welcome', compact('courses'));
    }
}
