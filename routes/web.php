<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\EliminarController;
use App\Http\Controllers\EditarController;

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

Route::get('/', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']); 
Route::get('/atras', [TaskController::class, 'index']);

Route::get('/registrar', [RegistrarController::class, 'index']);
Route::post('/registrar', [RegistrarController::class, 'registrar']);

Route::post('/editar', [EditarController::class, 'editar']);
Route::get('/usuario/{user}/editar', [EditarController::class, 'datos'])->name('usuario.editar');

Route::get('/usuario/{user}/eliminar', [EliminarController::class, 'eliminar'])->name('usuario.eliminar');