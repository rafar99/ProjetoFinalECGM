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
use App\Http\Controllers\PedidoController;

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

/*Route::get('/login', function () {
    return view('login');
});

Route::get('/registo', function () {
    return view('registo');

});*/
//Pagina Pedido - Admin
Route::get('/admin/dashboard',[PedidoController::class,'index']);

//Pagina Utilizadores - Admin
Route::get('/admin/users', [UtilizadorController::class,'index']);
Route::get('/admin/users/edit/{$id}', [UtilizadorController::class,'edit']);

Route::get('/admin/info/inicio', function () {
    $arr_info = ['Início','Empresa','Assistência','Contactos'];
    return view('backoffice/info/inicio', ['arr_info' => $arr_info]);
});

Route::get('/admin/info/empresa', function () {
    $arr_info = ['Início','Empresa','Assistência','Contactos'];
    return view('backoffice/info/empresa', ['arr_info' => $arr_info]);
});

Route::get('/admin/info/assistencia', function () {
    $arr_info = ['Início','Empresa','Assistência','Contactos'];
    return view('backoffice/info/assistencia', ['arr_info' => $arr_info]);
});

Route::get('/admin/info/contactos', function () {
    $arr_info = ['Início','Empresa','Assistência','Contactos'];
    return view('backoffice/info/contactos', ['arr_info' => $arr_info]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
