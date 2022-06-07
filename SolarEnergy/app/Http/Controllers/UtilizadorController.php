<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Utilizador;

class UtilizadorController extends Controller
{
    public function index() {

        $arr_info = ['Início','Empresa','Assistência','Contactos'];
        $utilizadores = Utilizador::all();
        
        return view('backoffice/users',['arr_info' => $arr_info, 'utilizadores'=>$utilizadores]);
    }
}
