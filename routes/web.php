<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('courses', CourseController::class);
// Route::controller(CourseController::class)->group(function () {
//     Route::get('courses', 'index');
//     Route::get('courses/create', 'create');
//     Route::get('courses/{course}', 'show');
// });

// Route::get('courses', function () {
//     return 'Aquí se mostrará la lista de cursos';
// })->name('courses.index');

// Route::get('courses/{course}', function () {
//     return 'Aquí se va a mostrar la información del curso';
// })->name('courses.show');
