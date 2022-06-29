<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalheEmpresa;
use DB;

class DetalheEmpresaController extends Controller
{
    public function index () {
        $arr_info = ['Início','Empresa','Assistência','Contactos'];

        $infos = DetalheEmpresa::all();

        return view('backoffice/info/tabelas/empresa', [
            'arr_info' => $arr_info,
            'infos' => $infos
        ]);
    }
}
