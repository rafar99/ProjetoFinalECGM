<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\UtilizadorController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\NossosProjetosController;
use App\Http\Controllers\ContactosController;

Route::get('/', function () {
    return view('home');
});

Route::get('/empresa', function () {
    return view('empresa');
});

Route::get('/assistencia', function () {
    return view('assistencia');
});

Route::get('/contactos', function () {
    return view('contactos');
});


//Pagina Pedido - Admin
Route::get('/admin/dashboard',[PedidoController::class,'index'])->middleware('auth');

//Pagina Utilizadores - Admin
Route::get('/admin/users', [UtilizadorController::class,'index'])->middleware('auth');
Route::get('/admin/users/edit/{id}', [UtilizadorController::class,'edit'])->middleware('auth');
Route::put('/admin/users/update/{id}', [UtilizadorController::class,'update'])->middleware('auth');

//Pagina Funcionário - Admin
Route::get('/admin/users/novofuncionario',[FuncionarioController::class,'create'])->middleware('auth');
Route::post('/admin/users',[FuncionarioController::class,'storeFunc'])->middleware('auth');

//Pagina Informação: Início - Admin
Route::get('/admin/info/inicio',[HomeController::class,'index'])->middleware('auth');
Route::get('/admin/info/inicio/inserir',[HomeController::class,'create'])->middleware('auth');
Route::post('/admin/info/inicio',[HomeController::class,'store'])->middleware('auth');
Route::get('/admin/info/inicio/edit/{id}',[HomeController::class,'edit'])->middleware('auth');
Route::put('/admin/info/inicio/update/{id}', [HomeController::class,'update'])->middleware('auth');

//Pagina Informação: Empresa - Admin
Route::get('/admin/info/empresa',[EmpresaController::class,'index'])->middleware('auth');
Route::get('/admin/info/empresa/inserir',[EmpresaController::class,'create'])->middleware('auth');
Route::post('/admin/info/empresa',[EmpresaController::class,'store'])->middleware('auth');
Route::get('/admin/info/empresa/edit/{id}',[EmpresaController::class,'edit'])->middleware('auth');
Route::put('/admin/info/empresa/update/{id}', [EmpresaController::class,'update'])->middleware('auth');

//Pagina Informação: Nossos Projetos - Admin
Route::get('/admin/info/nossosprojetos',[NossosProjetosController::class,'index'])->middleware('auth');
Route::get('/admin/info/nossosprojetos/inserir',[NossosProjetosController::class,'create'])->middleware('auth');
Route::post('/admin/info/nossosprojetos',[NossosProjetosController::class,'store'])->middleware('auth');
Route::get('/admin/info/nossosprojetos/edit/{id}',[NossosProjetosController::class,'edit'])->middleware('auth');
Route::put('/admin/info/nossosprojetos/update/{id}', [NossosProjetosController::class,'update'])->middleware('auth');

//Pagina Informação: Contactos - Admin
Route::get('/admin/info/contactos',[ContactosController::class,'index'])->middleware('auth');
Route::get('/admin/info/contactos/inserir',[ContactosController::class,'create'])->middleware('auth');
Route::post('/admin/info/contactos',[ContactosController::class,'store'])->middleware('auth');
Route::get('/admin/info/contactos/edit/{id}',[ContactosController::class,'edit'])->middleware('auth');
Route::put('/admin/info/contactos/update/{id}', [ContactosController::class,'update'])->middleware('auth');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
