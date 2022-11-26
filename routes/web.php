<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AdminSoporteController;
use App\Http\Controllers\EmprendimientosController;


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

Route::resource('/', InicioController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/registro', function (){
    return view('usuario.register');
});
Route::resource('/productos', ProductosController::class);
Route::post("/productos/eliminar", [ProductosController::class, 'eliminar']);

Route::resource('/mypes', AdminController::class);
Route::post("/mypes/deshabilitar", [AdminController::class, 'deshabilitar']);

Route::resource('/pregunta', PreguntaController::class);

Route::resource('/listapreguntas', AdminSoporteController::class);

Route::resource('/perfil', PerfilController::class);

Route::resource('/emprendimientos', EmprendimientosController::class);


require __DIR__.'/auth.php';
