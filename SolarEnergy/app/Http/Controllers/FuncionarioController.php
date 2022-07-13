<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Funcionario;
use App\Models\TipoFuncionario;
use App\Models\TipoUtilizador;
use DB;
class FuncionarioController extends Controller
{
    public function create(){
        $funcoes = TipoFuncionario::all();

        return view('backoffice.users.novo_funcionario',['funcoes'=>$funcoes]);
    }
    public function storeFunc(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255', 
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'funcao' => 'required',
            'nomecompleto' => 'required|string|max:255',
            'contacto' => 'required|string|max:13'
        ]);

        // var_dump(User::latest()->first()->id);die;

        $tipo = DB::table('tipo_utilizador')->where('descricao','Funcionario')->get();
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'tipoUser_id' => $tipo[0]->id,
            'ativo' => '1'
        ]);

        Funcionario::create([
            'nome' =>$validated['nomecompleto'],
            'contacto'=>$validated['contacto'],
            'tipoFuncionario_id' =>$validated['funcao'],
            'users_id' => User::latest()->first()->id
        ]);
        return redirect('/admin/users');

    }
}
