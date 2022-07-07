<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalheHome;
use DB;

class DetalheHomeController extends Controller
{
    public function index () {
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];

        $infos = DetalheHome::all();

        return view('backoffice/info/tabelas/inicio', [
            'arr_info' => $arr_info,
            'infos' => $infos
        ]);
    }
}
