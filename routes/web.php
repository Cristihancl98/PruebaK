<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\GestionController;

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
    return view('inicio');
})->name('inicio');

Route::view('login','login')->name('login');
Route::view('admin_inicio','admin.inicio')->name('admin_inicio');
Route::post('login',[LoginController::class, 'login']);
Route::post('agregarCategorias',[GestionController::class, 'setCategorias']);
Route::post('agregarProduct',[GestionController::class, 'agregarProducto']);
Route::post('borrar',[GestionController::class, 'borrarProducto']);
Route::post('editar',[GestionController::class, 'editarProducto']);
Route::post('obtenerProductor',[GestionController::class, 'obtenerProducto']);
Route::post('obtenerCategoria',[GestionController::class, 'obtenerCategoriaProductos']);
Route::post('comprar',[GestionController::class, 'comprarProducto']);
Route::get('productos',[GestionController::class, 'listarProductos']);
Route::get('categorias',[GestionController::class, 'listarCategoria']);
Route::get('countProducto',[GestionController::class, 'countListadoProducto']);
Route::get('countVenta',[GestionController::class, 'countListadoVentas']);
Route::get('listaVentas',[GestionController::class, 'listarVentas']);