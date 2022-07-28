@extends('layouts.main')

@section('title', 'SolarEnergy')
@section('imgcontacto', '../img/contacto.svg')
@section('imgfacebook', '../img/facebook.svg')
@section('imglinkedin', '../img/facebook.svg')
@if(auth()->user()!=null && auth()->user()->tipoUser_id!=2 )
  @php
    header("Location: " . URL::to('/dashboard'), true, 302);
    exit();
  @endphp
@endif
@section('content')

<div class="container-fluid mt-5">
    <div class="row ">
        <div class="col-md-12">
            <h3>Área de Cliente</h3>
        </div>
        @if (session('status'))
        <div id="alerta" class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <div class="row mt-5">
        @if(session()->has('msg_edit'))
        <div id="alerta" class="text-center alert alert-success">
          {{session()->get('msg_edit')}}  
        </div>  
        @endif 
        <div class="col-6">
            <div class="perfil">
                <h5>Dados de utilizador</h5>
            </div>

            <div class="infoPerfil mt-3">
                <p><b>Nome de utilizador:</b> {{$cliente->name}} </p>
                <p><b>Email:</b> {{$cliente->email}}</p>
            </div>
           
        </div>
        <div class="col-6">
            <div class="perfil">
                <h5>Perfil</h5>
            </div>

            <div class="infoPerfil mt-3">
                <p><b>Nome:</b> {{$cliente->nome}} </p>
                <p><b>Nif:</b> {{$cliente->nif}}</p>
                <p><b>Contacto:</b> {{$cliente->contacto}}</p>
                <p><b>Cliente:</b> {{$cliente->tipocliente}}</p>
                <p><b>Morada:</b> {{$cliente->morada}}</p>
            </div>

            

        </div>
        <div class="row">
            <div class="col-6">
                 <a href="/change-password" class="btn btn-success mt-4 botao-form">Atualizar palavra-passe</a>
            </div>
            <div class="col-6">
                    
                <button type="button" class="btn btn-danger mt-4 ml-4 float-end" data-bs-toggle="modal" data-bs-target="#desativar{{auth()->user()->id}}">Desativar Conta</button>
                <a href="/areacliente/editarcliente/{{$cliente->id}}" class="btn btn-success mt-4 botao-form">Editar</a>
            
                <!-- Modal Desativar conta -->
                <div id="desativar{{auth()->user()->id}}" class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Desativar Conta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <p>Tem a certeza que pretende desativar a conta?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="/areacliente/desativar/{{auth()->user()->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="ativo" value="0">
                                    <button type="submit" class="btn btn-danger">Desativar</button>
                                </form>
                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="perfil">
                <h5>Meus Pedidos</h5>
            </div>
            <div class="infoPerfil mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Painel</th>
                            <th scope="col">Tipo de Pedido</th>
                            <th scope="col">Descrição do Pedido</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Informação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listaAssistencia as $pedido)
                          <tr>
                            <th scope="row">{{$pedido->dataCriacao}}</th>
                            <td>{{$pedido->painel}}</td>
                            <td>{{$pedido->tipo}}</td>
                            <td>{{strlen($pedido->descricao)>30 ? substr($pedido->descricao,0,30).'....' : $pedido->descricao}}</td>
                            <td>{{$pedido->estado}}</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#info{{$pedido->id}}" class="btn btn-primary">Ver mais</button>
                            </td>
                        </tr>  
                        @endforeach
                        
                    </tbody>
                </table>
                @if($nAssistencias<=0)  
                    <div class="text-center"><b>Sem pedidos efetuados!</b></div>
                @endif
                <!-- Modal Ver Mais Informação -->
                @foreach($listaAssistencia as $pedido)
                    <div class="modal fade" id="info{{$pedido->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$cliente->nome}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <p><b>Painel:</b> {{$pedido->painel}}</p>
                            <p><b>Pedido:</b> {{$pedido->tipo}}</p>
                            <p><b>Descrição:</b> {{$pedido->descricao}}</p>
                            <p><b>Data de Registo:</b> {{$pedido->dataCriacao}}</p>
                            <p><b>Estado:</b> {{$pedido->estado}}</p>
                            <p><b>Disponibilidade: </b>{{$pedido->dia}} - {{$pedido->hora}}</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<hr class="divisor-rodape">
@endsection
