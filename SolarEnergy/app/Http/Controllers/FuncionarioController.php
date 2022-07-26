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

        //validar se os campos no formulario estão de acordo com o código abaixo
        //Por exemplo a password tem que ter um minimo de 8 caracters, é obrigatoria e necessita de um campo de confirmação
        $validated = $request->validate([
            'name' => 'required|string|max:255', 
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'funcao' => 'required',
            'nomecompleto' => 'required|string|max:255',
            'contacto' => 'required|string|max:13',
        ]);

        //verifica se o contacto possui letras e caso possua volta atras no registo e mostra a mensagem de erro
        if (preg_match("/[a-z]/i", $validated['contacto'])) {
            return redirect()->back()->with('error','O contacto contém carácteres numéricos!');

        //verifica se o nome de utilizador tem espaços em branco
        } elseif($validated['name'] == $validated['name'] && str_contains($validated['name'], ' ')){
            return redirect()->back()->with('error','O Nome de Utilizador tem espaços!');
        }
        //obter os nomes de tipos de funcionario
        $tipo = DB::table('tipo_utilizador')->where('descricao','Funcionario')->get();

        //cria um utilizador e depois cria o funcionario associado ao ultimo utilizador criado
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
            'users_id' => User::latest()->first()->id,
        ]);
        
        return redirect('/admin/users')->with('msg_create_func', 'Funcionario ' . $validated['nomecompleto'] . ' adicionado!');

    }
}
