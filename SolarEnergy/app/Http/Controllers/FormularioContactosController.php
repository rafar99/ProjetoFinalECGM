<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioContactos;

class FormularioContactosController extends Controller
{
    //Função responsável pelo envio dos dados do pedido de contacto para a base de dados.
    //Através do request os campos do formulario_contacto são preenchidos. 
    //Redireciona para a view Contactos e apresenta a mensagem de sucesso.

    public function store(Request $request){

        $formulario_contactos = new FormularioContactos;

        $formulario_contactos->nome = $request->nome;
        $formulario_contactos->email = $request->email;
        $formulario_contactos->assunto = $request->assunto;
        $formulario_contactos->mensagem = $request->mensagem;
        $formulario_contactos->estado_id = '2';

        $formulario_contactos->save();

        return redirect('/contactos')->with('msg', 'Pedido de Contacto enviado com sucesso!');
    }
}
