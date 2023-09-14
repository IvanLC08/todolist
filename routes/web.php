<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TareaController;

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

//Sesion
Route::get('/',[LoginController::class, 'index'])->name('login');
Route::post('/',[LoginController::class, 'login'])->name('iniciar-sesion');
Route::get('/logout',[LoginController::class, 'logout'])->name('cerrar-sesion');

//Usuario
Route::get('/registro', [UsuarioController::class,'index'])->name('registro');
Route::post('/alta-usuario', [UsuarioController::class,'store'])->name('altaUsuario');
Route::get('/home/{idUsuario}', [UsuarioController::class,'home'])->name('home');
Route::get('/completadas', [UsuarioController::class,'completadas'])->name('completadas');
Route::get('/pendientes', [UsuarioController::class,'pendientes'])->name('pendientes');

//Tarea
Route::post('/alta-tarea', [TareaController::class,'store'])->name('altaTarea');
Route::get('/obtener-tareas', [TareaController::class,'obtenerTareas'])->name('obtenerTareas');
