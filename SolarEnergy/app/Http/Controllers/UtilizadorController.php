<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\TipoUtilizador;
use DB;
class UtilizadorController extends Controller
{
    public function index() {

        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];
        // $utilizadores = Utilizador::all();
        
        $utilizadores = DB::table('users')
        ->leftJoin('tipo_utilizador','users.tipoUser_id','=','tipo_utilizador.id')
        ->select('users.*','tipo_utilizador.descricao')
        ->get();

        $adminsTecnicos = DB::table('users')
        ->leftJoin('tipo_utilizador','users.tipoUser_id','=','tipo_utilizador.id')
        ->select('users.*','tipo_utilizador.descricao')
        ->where('users.tipoUser_id','=','1')
        ->orWhere('users.tipoUser_id','=','2')
        ->get();

        $clientes = DB::table('users')
        ->leftJoin('tipo_utilizador','users.tipoUser_id','=','tipo_utilizador.id')
        ->select('users.*','tipo_utilizador.descricao')
        ->where('users.tipoUser_id','=','1')
        ->get();

        $countUtilizadores = DB::table('users')->select('*')->get()->count();

        $countAdminsTecnicos = DB::table('users')->select('*')->where('tipoUser_id','=','1')->orWhere('tipoUser_id', '=', '2')->get()->count();

        // $countTecnicos = DB::table('utilizador')->select('*')->where('tipoUtilizador_id','=','2')->get()->count();

        $countClientes = DB::table('users')->select('*')->where('tipoUser_id','=','3')->get()->count();

        return view('backoffice.users.users',[
            'arr_info' => $arr_info, 
            'utilizadores'=>$utilizadores,
            'adminsTec'=>$adminsTecnicos,
            'clientes'=>$clientes,
            'countUtilizadores'=> $countUtilizadores,
            'countAdminsTecnicos'=> $countAdminsTecnicos,
            'countClientes'=>$countClientes
        ]);

    }

    public function edit($id){
        $user = User::findOrFail($id);

        return view('backoffice.users.edit',['user' => $user]);
    }
}
