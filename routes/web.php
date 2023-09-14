<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [TareaController::class,'index'])->name('index');
Route::post('/alta-tarea', [TareaController::class,'store'])->name('altaTarea');
Route::post('/modificar-tarea', [TareaController::class,'update'])->name('modificarTarea');
Route::post('/eliminar-tarea', [TareaController::class,'delete'])->name('eliminarTarea');