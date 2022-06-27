<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Utilizador;
use App\Models\TipoUtilizador;
use DB;
class UtilizadorController extends Controller
{
    public function index() {

        $arr_info = ['Início','Empresa','Assistência','Contactos'];
        // $utilizadores = Utilizador::all();
        
        $utilizadores = DB::table('utilizador')
        ->leftJoin('tipo_utilizador','utilizador.tipoUtilizador_id','=','tipo_utilizador.id')
        ->select('utilizador.*','tipo_utilizador.descricao')
        ->get();

        $countUtilizadores = DB::table('utilizador')->select('*')->get()->count();

        $countAdminsTecnicos = DB::table('utilizador')->select('*')->where('tipoUtilizador_id','=','1')->orWhere('tipoUtilizador_id', '=', '2')->get()->count();

        // $countTecnicos = DB::table('utilizador')->select('*')->where('tipoUtilizador_id','=','2')->get()->count();

        $countClientes = DB::table('utilizador')->select('*')->where('tipoUtilizador_id','=','3')->get()->count();

        return view('backoffice.users.users',[
            'arr_info' => $arr_info, 
            'utilizadores'=>$utilizadores,
            'countUtilizadores'=> $countUtilizadores,
            'countAdminsTecnicos'=> $countAdminsTecnicos,
            'countClientes'=>$countClientes
        ]);

    }

    public function edit($id){
        $user = Utilizador::findOrFail($id);

        return view('backoffice.users.edit',['user' => $user]);
    }
}
