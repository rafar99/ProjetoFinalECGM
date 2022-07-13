@extends('layouts.main')

@section('title', 'SolarEnergy')
@section('imgcontacto', '../img/contacto.svg')
@section('imgfacebook', '../img/facebook.svg')
@section('imglinkedin', '../img/facebook.svg')

@section('content')

<div class="container-fluid mt-5">
    <div class="row ">
        <div class="col-md-12">
            <h3>Área de Cliente</h3>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="perfil">
                <h5>Perfil</h5>
            </div>

            <div class="infoPerfil mt-3">
                <p>Nome: {{$cliente->nome}} </p>
                <p>Nif: {{$cliente->nif}}</p>
                <p>Contacto: {{$cliente->contacto}}</p>
                <p>Morada: {{$cliente->morada}}</p>
            </div>

            <div class="botaoPerfil">
                <a href="/areacliente/editarcliente/{{$cliente->id}}"><button type="button" class="btn btn-success mt-4 botao-form">Editar</button></a>
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
                            <th scope="col">Informação Pedido</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<hr class="divisor-rodape">
@endsection
