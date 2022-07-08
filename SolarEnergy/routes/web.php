<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\FormularioContactosController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\HomeController;

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

/*Route::get('/', function () {
    return view('dashboard');
});*/

Route::get('/empresa', function () {
    return view('empresa');
});

Route::get('/assistencia', function () {
    return view('assistencia');
});

Route::get('/contactos', function () {
    return view('contactos');
});

//rota para a informação da pagina
Route::get('/', [HomeController::class, 'index']);



//rota para informação da pagina empresa
Route::get('/empresa', [EmpresaController::class, 'index']);


//rota da pagina de pedidos de assistencia
Route::get('/assistencia', [PedidoController::class, 'index'])->middleware('auth');
Route::post('/assistencia', [PedidoController::class, 'store'])->middleware('auth');


//rota dos detalhes do contacto na pagina contactos
Route::get('/contactos', [ContactosController::class, 'index']);

//formulario contactos
Route::post('/contactos', [FormularioContactosController::class, 'store']);

//login e registo

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
