<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Alumno;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/alumnos', [Alumno::class, 'index']);
Route::get('/alumnos/nuevo', [Alumno::class, 'new']);
Route::post('/alumnos/crear', [Alumno::class, 'create']);
Route::post('/alumnos/actualizar', [Alumno::class, 'update']);
Route::get('/alumnos/borrar/{id}', [Alumno::class, 'delete']);
Route::get('/alumnos/{id}', [Alumno::class, 'show']);
