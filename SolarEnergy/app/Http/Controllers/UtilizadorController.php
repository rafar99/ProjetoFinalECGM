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

        // $assistencia = DB::table('pedido')
        // ->leftJoin('tipo_painel','pedido.tipoPainel','=','tipo_painel.id')
        // ->leftJoin('tipo_pedido','pedido.tipoPedido','=','tipo_pedido.id')
        // ->select('tipo_painel.descricao','tipo_pedido.descricao')
        // -get();
        return view('backoffice.users.users',['arr_info' => $arr_info, 'utilizadores'=>$utilizadores]);

    }

    public function edit($id){
        $user = Utilizador::findOrFail($id);

        return view('backoffice.users.edit',['user' => $user]);
    }
}
