<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalheInicio;
use DB;

class DetalheInicioController extends Controller
{
    public function index () {
        $arr_info = ['Início','Empresa','Assistência','Contactos'];

        $infos = DetalheInicio::all();

        return view('backoffice/info/tabelas/inicio', [
            'arr_info' => $arr_info,
            'infos' => $infos
        ]);
    }
}
