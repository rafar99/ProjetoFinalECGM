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
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\NossosProjetosController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\FormularioContactosController;
use App\Http\Controllers\TipoClienteController;
use App\Http\Controllers\TipoEstadoController;
use App\Http\Controllers\TipoFuncionarioController;
use App\Http\Controllers\TipoPedidoController;
use App\Http\Controllers\TipoUtilizadorController;
use App\Http\Controllers\TipoPainelController;

//Cliente
Route::get('/infocliente', [ClienteController::class, 'create'])->middleware('auth');
Route::get('/areacliente/{id}', [ClienteController::class, 'show'])->middleware('auth');
Route::post('/areacliente/{id}', [ClienteController::class, 'store'])->middleware('auth');
Route::get('/areacliente/editarcliente/{id}', [ClienteController::class, 'edit'])->middleware('auth');
Route::put('/areacliente/editarcliente/update/{id}', [ClienteController::class, 'update'])->middleware('auth');
Route::put('/areacliente/desativar/{id}',[ClienteController::class, 'desativar'])->middleware('auth');
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



//Pagina Pedido - Admin
Route::get('/admin',[PedidoController::class,'indexAdmin'])->middleware('auth');
Route::get('/admin/dashboard',[PedidoController::class,'indexAdmin'])->middleware('auth');
Route::get('/admin/dashboard/edit/{id}',[PedidoController::class,'edit'])->middleware('auth');
Route::put('/admin/dashboard/update/{id}',[PedidoController::class,'update'])->middleware('auth');

//Pagina Utilizadores - Admin
Route::get('/admin/users', [UtilizadorController::class,'indexAdmin'])->middleware('auth');
Route::get('/admin/users/edit/{id}', [UtilizadorController::class,'edit'])->middleware('auth');
Route::put('/admin/users/update/{id}', [UtilizadorController::class,'update'])->middleware('auth');

//Pagina Funcionário - Admin
Route::get('/admin/users/novofuncionario',[FuncionarioController::class,'create'])->middleware('auth');
Route::post('/admin/users',[FuncionarioController::class,'storeFunc'])->middleware('auth');

//Pagina Informação: Início - Admin
Route::get('/admin/info/inicio',[HomeController::class,'indexAdmin'])->middleware('auth');
Route::get('/admin/info/inicio/inserir',[HomeController::class,'create'])->middleware('auth');
Route::post('/admin/info/inicio',[HomeController::class,'store'])->middleware('auth');
Route::get('/admin/info/inicio/edit/{id}',[HomeController::class,'edit'])->middleware('auth');
Route::put('/admin/info/inicio/update/{id}', [HomeController::class,'update'])->middleware('auth');
Route::delete('/admin/info/inicio/{id}', [HomeController::class,'destroy'])->middleware('auth');

//Pagina Informação: Empresa - Admin
Route::get('/admin/info/empresa',[EmpresaController::class,'indexAdmin'])->middleware('auth');
Route::get('/admin/info/empresa/inserir',[EmpresaController::class,'create'])->middleware('auth');
Route::post('/admin/info/empresa',[EmpresaController::class,'store'])->middleware('auth');
Route::get('/admin/info/empresa/edit/{id}',[EmpresaController::class,'edit'])->middleware('auth');
Route::put('/admin/info/empresa/update/{id}', [EmpresaController::class,'update'])->middleware('auth');
Route::delete('/admin/info/empresa/{id}', [EmpresaController::class,'destroy'])->middleware('auth');

//Pagina Informação: Nossos Projetos - Admin
Route::get('/admin/info/nossosprojetos',[NossosProjetosController::class,'indexAdmin'])->middleware('auth');
Route::get('/admin/info/nossosprojetos/inserir',[NossosProjetosController::class,'create'])->middleware('auth');
Route::post('/admin/info/nossosprojetos',[NossosProjetosController::class,'store'])->middleware('auth');
Route::get('/admin/info/nossosprojetos/edit/{id}',[NossosProjetosController::class,'edit'])->middleware('auth');
Route::put('/admin/info/nossosprojetos/update/{id}', [NossosProjetosController::class,'update'])->middleware('auth');
Route::delete('/admin/info/nossosprojetos/{id}', [NossosProjetosController::class,'destroy'])->middleware('auth');

//Pagina Informação: Contactos - Admin
Route::get('/admin/info/contactos',[ContactosController::class,'indexAdmin'])->middleware('auth');
Route::get('/admin/info/contactos/inserir',[ContactosController::class,'create'])->middleware('auth');
Route::post('/admin/info/contactos',[ContactosController::class,'store'])->middleware('auth');
Route::get('/admin/info/contactos/edit/{id}',[ContactosController::class,'edit'])->middleware('auth');
Route::put('/admin/info/contactos/update/{id}', [ContactosController::class,'update'])->middleware('auth');
Route::delete('/admin/info/contactos/{id}', [ContactosController::class,'destroy'])->middleware('auth');

//Pagina Formulários de contactos - Admin
Route::get('/admin/formcontactos',[FormularioContactosController::class,'indexAdmin'])->middleware('auth');
Route::get('/admin/formcontactos/edit/{id}',[FormularioContactosController::class,'edit'])->middleware('auth');
Route::put('/admin/formcontactos/update/{id}', [FormularioContactosController::class,'update'])->middleware('auth');


/////////////-----TIPOS-----////////////////
//Pagina Tipo Utilizador - Admin
Route::get('/admin/tipoutilizador',[TipoUtilizadorController::class,'index'])->middleware('auth');
Route::get('/admin/tipoutilizador/inserir',[TipoUtilizadorController::class,'create'])->middleware('auth');
Route::post('/admin/tipoutilizador',[TipoUtilizadorController::class,'store'])->middleware('auth');
Route::get('/admin/tipoutilizador/edit/{id}',[TipoUtilizadorController::class,'edit'])->middleware('auth');
Route::put('/admin/tipoutilizador/update/{id}', [TipoUtilizadorController::class,'update'])->middleware('auth');
Route::delete('/admin/tipoutilizador/{id}', [TipoUtilizadorController::class,'destroy'])->middleware('auth');

//Pagina Tipo Cliente - Admin
Route::get('/admin/tipocliente',[TipoClienteController::class,'index'])->middleware('auth');
Route::get('/admin/tipocliente/inserir',[TipoClienteController::class,'create'])->middleware('auth');
Route::post('/admin/tipocliente',[TipoClienteController::class,'store'])->middleware('auth');
Route::get('/admin/tipocliente/edit/{id}',[TipoClienteController::class,'edit'])->middleware('auth');
Route::put('/admin/tipocliente/update/{id}', [TipoClienteController::class,'update'])->middleware('auth');
Route::delete('/admin/tipocliente/{id}', [TipoClienteController::class,'destroy'])->middleware('auth');

//Pagina Tipo Funcionario - Admin
Route::get('/admin/tipofuncionario',[TipoFuncionarioController::class,'index'])->middleware('auth');
Route::get('/admin/tipofuncionario/inserir',[TipoFuncionarioController::class,'create'])->middleware('auth');
Route::post('/admin/tipofuncionario',[TipoFuncionarioController::class,'store'])->middleware('auth');
Route::get('/admin/tipofuncionario/edit/{id}',[TipoFuncionarioController::class,'edit'])->middleware('auth');
Route::put('/admin/tipofuncionario/update/{id}', [TipoFuncionarioController::class,'update'])->middleware('auth');
Route::delete('/admin/tipofuncionario/{id}', [TipoFuncionarioController::class,'destroy'])->middleware('auth');

//Pagina Tipo Estado - Admin
Route::get('/admin/tipoestado',[TipoEstadoController::class,'index'])->middleware('auth');
Route::get('/admin/tipoestado/inserir',[TipoEstadoController::class,'create'])->middleware('auth');
Route::post('/admin/tipoestado',[TipoEstadoController::class,'store'])->middleware('auth');
Route::get('/admin/tipoestado/edit/{id}',[TipoEstadoController::class,'edit'])->middleware('auth');
Route::put('/admin/tipoestado/update/{id}', [TipoEstadoController::class,'update'])->middleware('auth');
Route::delete('/admin/tipoestado/{id}', [TipoEstadoController::class,'destroy'])->middleware('auth');

//Pagina Tipo Painel - Admin
Route::get('/admin/tipopainel',[TipoPainelController::class,'index'])->middleware('auth');
Route::get('/admin/tipopainel/inserir',[TipoPainelController::class,'create'])->middleware('auth');
Route::post('/admin/tipopainel',[TipoPainelController::class,'store'])->middleware('auth');
Route::get('/admin/tipopainel/edit/{id}',[TipoPainelController::class,'edit'])->middleware('auth');
Route::put('/admin/tipopainel/update/{id}', [TipoPainelController::class,'update'])->middleware('auth');
Route::delete('/admin/tipopainel/{id}', [TipoPainelController::class,'destroy'])->middleware('auth');

//Pagina Tipo Pedido - Admin
Route::get('/admin/tipopedido',[TipoPedidoController::class,'index'])->middleware('auth');
Route::get('/admin/tipopedido/inserir',[TipoPedidoController::class,'create'])->middleware('auth');
Route::post('/admin/tipopedido',[TipoPedidoController::class,'store'])->middleware('auth');
Route::get('/admin/tipopedido/edit/{id}',[TipoPedidoController::class,'edit'])->middleware('auth');
Route::put('/admin/tipopedido/update/{id}', [TipoPedidoController::class,'update'])->middleware('auth');
Route::delete('/admin/tipopedido/{id}', [TipoPedidoController::class,'destroy'])->middleware('auth');