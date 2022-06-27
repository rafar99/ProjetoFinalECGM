<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use DB;

class PedidoController extends Controller
{
    public function index(){
        $arr_info = ['Início','Empresa','Assistência','Contactos'];

        $ass = DB::table('pedido')
        ->leftJoin('tipo_painel','pedido.tipoPainel','=','tipo_painel.id')
        ->leftJoin('tipo_pedido','pedido.tipoPedido','=','tipo_pedido.id')
        ->leftJoin('tipo_estado','pedido.estado','=','tipo_estado.id')
        ->select('pedido.*','tipo_painel.descricao as painel','tipo_pedido.descricao as tipo','tipo_estado.descricao as estado')
        ->get();

        $countAss = DB::table('pedido')->select('*')->get()->count();

        $countAssFinalizadas = DB::table('pedido')->select('*')->where('estado','=','1')->get()->count();
        
        $countAssAtuais = DB::table('pedido')->select('*')->where('estado','=','2')->get()->count();

        $countAssPorExecutar = DB::table('pedido')->select('*')->where('estado','=','3')->get()->count();

        return view('backoffice.dashboard',[
            'arr_info' => $arr_info, 
            'ass'=>$ass,
            'countAss'=>$countAss,
            'countAssFinalizadas'=>$countAssFinalizadas,
            'countAssAtuais'=>$countAssAtuais,
            'countAssPorExecutar'=>$countAssPorExecutar

        ]);
    }
}
