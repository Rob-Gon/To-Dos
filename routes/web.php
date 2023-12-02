<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\CategoriasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Mostrar todas las tareas y la función para guardar una tarea
Route::get('/', [TareasController::class, 'index'])->name('mis-tareas');
Route::post('/', [TareasController::class, 'store'])->name('mis-tareas');

// Mostrar el formulario de creación de tareas
Route::get('/tareas', [TareasController::class, 'create'])->name('tareas-create');

// Mostrar todas las tareas, el formulario de edición de una tarea y la eliminación de una tarea
Route::get('/tareas/{id}', [TareasController::class, 'show'])->name('tareas-edit');
Route::patch('/tareas/{id}', [TareasController::class, 'update'])->name('tareas-update');
Route::delete('/tareas/{id}', [TareasController::class, 'delete'])->name('tareas-delete');

Route::resource('categorias', CategoriasController::class);
