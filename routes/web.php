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

Route::get('/', [LoginController::class, 'index']);
Route::get('/index', [TaskController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/atras', [TaskController::class, 'index']);

Route::get('/registrar', [RegistrarController::class, 'index']);
Route::post('/registrar', [RegistrarController::class, 'registrar']);

Route::get('/editar', [EditarController::class, 'error']);
Route::post('/editar', [EditarController::class, 'editar']);
Route::get('/usuario/{user}/editar', [EditarController::class, 'index'])->name('usuario.editar')->middleware('auth');

Route::get('/usuario/{user}/eliminar', [EliminarController::class, 'eliminar'])->name('usuario.eliminar');