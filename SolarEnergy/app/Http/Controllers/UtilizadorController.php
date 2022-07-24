<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\TipoUtilizador;
use DB;
class UtilizadorController extends Controller
{
    public function indexAdmin() {

        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];
        
        $utilizadores = DB::table('users')
        ->leftJoin('tipo_utilizador','users.tipoUser_id','=','tipo_utilizador.id')
        ->select('users.*','tipo_utilizador.descricao')
        ->get();

        $admins = DB::table('users')
        ->leftJoin('tipo_utilizador','users.tipoUser_id','=','tipo_utilizador.id')
        ->select('users.*','tipo_utilizador.descricao')
        ->where('users.tipoUser_id','=','1')
        ->get();

        $tecnicos = DB::table('users')
        ->leftJoin('tipo_utilizador','users.tipoUser_id','=','tipo_utilizador.id')
        ->leftJoin('funcionario as f', 'users.id','=','f.users_id')
        // ->leftJoin('disponibilidade','funcionario.disponibilidade_id','=','disponibilidade.id')
        ->select('users.*','tipo_utilizador.descricao as tipo','f.id as fid','f.nome','f.contacto','f.dataRegisto'/*,'disponibilidade.dia','disponibilidade.hora'*/)
        // ->select('users.id','users.name','f.id as fid','f.nome')
        ->where('users.tipoUser_id','=','3')
        ->get();

        $tecnicosFuncao = DB::table('funcionario')
        ->leftJoin('users','funcionario.users_id','=','users.id')
        ->leftJoin('tipo_funcionario','funcionario.tipoFuncionario_id','=','tipo_funcionario.id')
        ->select('tipo_funcionario.descricao as tipo' , 'funcionario.id as fid')
        ->get();


        $clientes = DB::table('users')
        ->leftJoin('tipo_utilizador','users.tipoUser_id','=','tipo_utilizador.id')
        ->leftJoin('cliente as c', 'users.id','=','c.utilizador_id')
        ->leftJoin('disponibilidade','c.disponibilidade','=','disponibilidade.id')
        ->select('users.*','tipo_utilizador.descricao as tipo','c.id as cid','c.nome','c.morada','c.contacto','c.nif','c.dataRegisto','disponibilidade.*')
        ->where('users.tipoUser_id','=','2')
        ->get();

        $clienteTipo = DB::table('cliente')
        ->leftJoin('users','cliente.utilizador_id','=','users.id')
        ->leftJoin('tipo_cliente','cliente.tipoCliente','=','tipo_cliente.id')
        ->select('tipo_cliente.descricao as tipo' , 'cliente.id as cid')
        ->get();

        $countUtilizadores = DB::table('users')->select('*')->count();

        $countAdmins = DB::table('users')->select('*')->where('tipoUser_id','=','1')->count();

        $countClientes = DB::table('users')->select('*')->where('tipoUser_id','=','2')->count();
        
        $countTecnicos = DB::table('users')->select('*')->where('tipoUser_id','=','3')->count();


        // $infoFunc = DB::table('funcionario')->where('tipo')->first();

        return view('backoffice.users.users',[
            'arr_info' => $arr_info, 
            'utilizadores'=>$utilizadores,
            'admins'=>$admins,
            'tecnicos'=>$tecnicos,
            'tecnicosFuncao'=>$tecnicosFuncao,
            'clientes'=>$clientes,
            'clienteTipo'=>$clienteTipo,
            'countUtilizadores'=> $countUtilizadores,
            'countAdmins'=> $countAdmins,
            'countTecnicos'=> $countTecnicos,
            'countClientes'=>$countClientes
        ]);

    }

    public function edit($id){
        $user = User::findOrFail($id);
        $tipos = TipoUtilizador::all();
        return view('backoffice.users.edit',['user' => $user,'tipos' => $tipos]);
    }

    public function update(Request $request){

        $user = User::findOrFail($request->id);

        $tipos = TipoUtilizador::all()->count();
        if($request->tipoUser > $tipos || $request->tipoUser < 0 )
            return back()->with('error','Tipo de Utilizador inválido!');
        
        if($request->ativo > 1 || $request->ativo < 0)
            return back()->with('error','Estado inválido!');

        $user->tipoUser_id = $request->tipoUser;
        $user->ativo = $request->ativo;

        $user->save();

        return redirect('/admin/users')->with('msg', 'Utilizador alterado com sucesso!');
    }
}
