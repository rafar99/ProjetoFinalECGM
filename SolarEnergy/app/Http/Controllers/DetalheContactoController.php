<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalheContacto;
use DB;

class DetalheContactoController extends Controller
{
    public function index () {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];

        $infos = DetalheContacto::all();

        return view('backoffice/info/tabelas/contactos', [
            'arr_info' => $arr_info,
            'infos' => $infos
        ]);
    }
}
