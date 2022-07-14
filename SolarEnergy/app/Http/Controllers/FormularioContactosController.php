<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioContactos;
use App\Models\TipoEstado;
use DB;

class FormularioContactosController extends Controller
{
    public function index(){
        $infos = DB::table('formulario_contactos')
        ->leftJoin('tipo_estado','formulario_contactos.estado_id','=','tipo_estado.id')
        ->select('formulario_contactos.*','tipo_estado.descricao')
        ->get();
        
        $arr_info = ['Início','Empresa','Nossos Projetos','Contactos'];
        return view('backoffice.form_contactos.form-contactos', ['arr_info' => $arr_info,'infos' => $infos]);
    }

    public function edit($id){
        $form_id = FormularioContactos::findOrFail($id);
        $estados = TipoEstado::where('descricao','Lido')->orWhere('descricao','Não lido')->get();
        $countEstados = $estados->count();
        // var_dump($estados[0]->id);die;
        return view('backoffice.form_contactos.edit-form-contactos',['form_id'=>$form_id,'estados'=>$estados,'countEst'=>$countEstados]);
    }

    public function update(Request $request){
        $estado = FormularioContactos::findOrFail($request->id);
        if($request->tipoEstado > 2){
            return back()->with('error_estado','Estado inválido!');
        }
        $estado->estado_id = $request->tipoEstado;

        $estado->save();

        return redirect('/admin/formcontactos')->with('msg', 'Marcado como ' . $request->tipoEstado . '!');
    }
}
