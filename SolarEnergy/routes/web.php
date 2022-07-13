<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\FormularioContactosController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;

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

//Cliente
Route::get('/infocliente', [ClienteController::class, 'create'])->middleware('auth');
Route::get('/areacliente/{id}', [ClienteController::class, 'show'])->middleware('auth');
Route::post('/areacliente/{id}', [ClienteController::class, 'store'])->middleware('auth');
Route::get('/areacliente/editarcliente/{id}', [ClienteController::class, 'edit'])->middleware('auth');
Route::put('/areacliente/editarcliente/update/{id}', [ClienteController::class, 'update'])->middleware('auth');

//Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'index']);


//Empresa
Route::get('/empresa', [EmpresaController::class, 'index']);


//Assistencia
Route::get('/assistencia', [PedidoController::class, 'index'])->middleware('auth');
Route::post('/assistencia', [PedidoController::class, 'store'])->middleware('auth');


//Contactos
Route::get('/contactos', [ContactosController::class, 'index']);

//Formulario Contactos
Route::post('/contactos', [FormularioContactosController::class, 'store']);

//login e registo

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});*/
