<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalheNossoProjeto;
use DB;

class DetalheNossoProjetoController extends Controller
{
    public function index () {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];

        // $infos = DetalheEmpresa::all();

        return view('backoffice/info/tabelas/nossosprojetos', [
            'arr_info' => $arr_info,
            'infos' => $infos
        ]);
    }
}
