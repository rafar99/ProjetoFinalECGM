<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\TipoUtilizador;
use App\Models\TipoFuncionario;
use App\Models\Funcionario;
use DB;
class UtilizadorController extends Controller
{
    public function indexAdmin() {
        //array simples apenas para guardar o nome das páginas de informação e mostrar no frontend
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];
        //obter todos os utilizadores e o seu tipo de utilizador
        $utilizadores = DB::table('users')
        ->leftJoin('tipo_utilizador','users.tipoUser_id','=','tipo_utilizador.id')
        ->select('users.*','tipo_utilizador.descricao')
        ->get();
        
        //obter todos os administradores(tipoUser_id=1) e o seu tipo de utilizador
        $admins = DB::table('users')
        ->leftJoin('tipo_utilizador','users.tipoUser_id','=','tipo_utilizador.id')
        ->select('users.*','tipo_utilizador.descricao')
        ->where('users.tipoUser_id','=','1')
        ->get();
        
        //obter todos os funcionarios (tipoUser_id=3) e o seu tipo de utilizador
        $tecnicos = DB::table('users')
        ->leftJoin('tipo_utilizador','users.tipoUser_id','=','tipo_utilizador.id')
        ->leftJoin('funcionario as f', 'users.id','=','f.users_id')
        ->select('users.*',
            'tipo_utilizador.descricao as tipo',
            'f.id as fid','f.nome','f.contacto','f.dataRegisto','f.foto'
        )
        ->where('users.tipoUser_id','=','3')
        ->get();
        
        //obter informação dos funcionarios para ser mostrado depois num modal
        $tecnicosFuncao = DB::table('funcionario')
        ->leftJoin('users','funcionario.users_id','=','users.id')
        ->leftJoin('tipo_funcionario','funcionario.tipoFuncionario_id','=','tipo_funcionario.id')
        ->select('tipo_funcionario.descricao as tipo' , 'funcionario.id as fid')
        ->get();


        //obter todos os clientes (tipoUser_id=2) e o seu tipo de utilizador
        $clientes = DB::table('users')
        ->leftJoin('tipo_utilizador','users.tipoUser_id','=','tipo_utilizador.id')
        ->leftJoin('cliente as c', 'users.id','=','c.utilizador_id')
        ->select('users.id','users.name','users.email','users.ativo',
            'tipo_utilizador.descricao as tipo',
            'c.id as cid','c.nome','c.morada','c.contacto','c.nif','c.dataRegisto')
        ->where('users.tipoUser_id','=','2')
        ->get();

        //obter informação dos clientes para ser mostrado depois num modal
        $clienteTipo = DB::table('cliente')
        ->leftJoin('users','cliente.utilizador_id','=','users.id')
        ->leftJoin('tipo_cliente','cliente.tipoCliente','=','tipo_cliente.id')
        ->select('tipo_cliente.descricao as tipo' , 'cliente.id as cid')
        ->get();

        $countUtilizadores = DB::table('users')->select('*')->count();

        $countAdmins = DB::table('users')->select('*')->where('tipoUser_id','=','1')->count();

        $countClientes = DB::table('users')->select('*')->where('tipoUser_id','=','2')->count();
        
        $countTecnicos = DB::table('users')->select('*')->where('tipoUser_id','=','3')->count();

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

    //mostra a página de editar o utilizador que teve o seu id passado como parametro e que permitirá apenas alterar a si mesmo
    public function edit($id){
        $user = User::findOrFail($id);
        $tipos = TipoUtilizador::all();
        $funcionario = Funcionario::where('users_id','=',$id)->first();
        $tipos_func = TipoFuncionario::all();
        return view('backoffice.users.edit',['user' => $user,'tipos' => $tipos,'funcionario'=>$funcionario ,'funcs' => $tipos_func]);
    }

    //funcao que atualiza, de facto, o utilizador
    public function update(Request $request){

        $user = User::findOrFail($request->id);

        //total de tipos de utilizador
        $tipos = TipoUtilizador::all()->count();

        //obter conta do funcionario associado ao id passado como parametro
        $funcionario = Funcionario::where('users_id','=',$request->id)->first();
        

        //verifica se o tipo de utilizador é maior que o count() ou se é menor que 0, caso seja verdade, volta atrás e mostra uma msg de erro
        if($request->tipoUser > $tipos || $request->tipoUser < 0 )
            return back()->with('error','Tipo de Utilizador inválido!');
        //verifica se o ativo é maior que 1 ou menor que 0, caso seja verdade, volta atrás e mostra uma msg de erro
        if($request->ativo > 1 || $request->ativo < 0)
            return back()->with('error','Estado inválido!');

        //guarda as alterações e redireciona com uma mensagem de sucesso
        $user->tipoUser_id = $request->tipoUser;
        $user->ativo = $request->ativo;

        if($funcionario->users_id==$request->id){
            $funcionario->nome = $request->nomecompleto;
            $funcionario->contacto = $request->contacto;
            $funcionario->tipoFuncionario_id = $request->tipoFunc;

            if($request->hasFile('foto') && $request->file('foto')->isValid()){
                $requestImage = $request->foto;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $requestImage->move(public_path('backoffice_assets/dist/img/func'), $imageName);
                $funcionario->foto = $imageName;
            }
            $funcionario->save();
        }

        $user->save();

        return redirect('/admin/users')->with('msg_edit_estado', 'Utilizador ' . $user->name . ' alterado com sucesso!');
    }
}
