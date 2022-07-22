@extends('layouts.main')

@section('title', 'SolarEnergy')
@section('imgcontacto', '/img/contacto.svg')
@section('imgfacebook', '/img/facebook.svg')
@section('imglinkedin', '/img/facebook.svg')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/imagem1.jpg" class="d-block w-100">
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="titulo">
                <h3>Pedido de Assistência Técnica ao domicilio/empresa</h3>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <form action="/assistencia" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value='{{$cliente->nome}}' disabled>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="contacto" id="contacto" placeholder="Contacto" value='{{$cliente->contacto}}' disabled>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="rua" id="rua" placeholder="Rua" {{$tipoUser !=2 ? "disabled" : "" }}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="porta" id="nPorta" placeholder="Nº Porta" {{$tipoUser !=2 ? "disabled" : "" }}>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="codigo_postal" id="codigo_postal" placeholder="Código-Postal" {{$tipoUser !=2 ? "disabled" : "" }}>
                        </div>
                    </div>
                
                    <div class="col">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control"  name="concelho" id="concelho" placeholder="Concelho" {{$tipoUser !=2 ? "disabled" : "" }}>
                        </div>
                    </div>
                    
                </div>

                <div class="form-group mt-3">
                    <label for="tipo_painel">Tipo Painel</label>
                    <select name ="tipoPainel" class="form-control" id="tipoPainel">
                        @foreach ($paineis as $painel)
                            <option value="{{$painel->id}}">{{$painel->descricao}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="tipo_assistencia">Tipo de Assistência</label>
                    <select name ="tipoPedido" class="form-control" id="tipoPedido">
                        @foreach ($tipo_pedido as $pedido)
                            <option value="{{$pedido->id}}">{{$pedido->descricao}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col mt-3">
                        <p>Disponibilidade do Cliente</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mt-2">
                            <input type="date" class="form-control" id="dia" name="dia">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mt-2">
                            <input type="time" class="form-control" id="hora" name="hora">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Descrição"></textarea>
                </div>
                <button type="submit" class="btn btn-success mt-4 botao-form">Enviar</button>
            </form>
        </div>
    </div>
</div>
<hr class="divisor-rodape">

@endsection
