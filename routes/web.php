<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AdminSoporteController;
use App\Http\Controllers\EmprendimientosController;
use App\Http\Controllers\PerfilMYPEController;
use App\Http\Controllers\ListaProductosController;
use App\Http\Controllers\ProductoDetalleController;


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
Route::resource('/productos', ProductosController::class)->middleware('auth.basic');
Route::post("/productos/eliminar", [ProductosController::class, 'eliminar'])->middleware('auth.basic');

Route::resource('/mypes', AdminController::class)->middleware('auth.basic');
Route::post("/mypes/deshabilitar", [AdminController::class, 'deshabilitar'])->middleware('auth.basic');

Route::resource('/pregunta', PreguntaController::class)->middleware('auth.basic');

Route::resource('/listapreguntas', AdminSoporteController::class)->middleware('auth.basic');

Route::resource('/perfil', PerfilController::class)->middleware('auth.basic');

Route::resource('/emprendimientos', EmprendimientosController::class);

Route::resource('/producto', ProductoDetalleController::class);

Route::resource('/listaproductos', ListaProductosController::class);

Route::resource('/pyme', PerfilMYPEController::class);

require __DIR__.'/auth.php';
