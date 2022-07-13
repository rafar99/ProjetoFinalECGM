@extends('layouts.main')

@section('title', 'SolarEnergy')
@section('imgcontacto', '/img/contacto.svg')
@section('imgfacebook', '/img/facebook.svg')
@section('imglinkedin', '/img/facebook.svg')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/imagem3.jpg" class="d-block w-100">
        <div class="carousel-caption texto-carrousel">
            <h3>Assistência Técnica</h3>
            <p>Instalação, Manutenção e Avarias</p>
            <a href="#seccao"><button type="button" class="btn btn-success">Começar</button></a>
          </div>
      </div>
    </div>
</div>

<div class="container-fluid mt-5"  id="seccao">
    @foreach($secaoUm as $secUm)
    <div class="row">
        <div class="col">
            <div class="titulo text-center">
                <h2>{{$secUm->titulo}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="texto mt-5">
                <p>{{$secUm->descricao}}</p>
            </div>
        </div>
    </div>
    @endforeach
    <!--Fazer um ciclo para listar -->
    <div class="row justify-content-center icones mt-5">
        <div class="col-4 mt-3">
            <div class="card-img">
                <img class="card-img-top rounded mx-auto d-block " src="img/instalacao.png" alt="Instalação">
                <div class="card-body">
                    <h6 class="card-title text-center mt-2">Instalação</h6>
                </div>
            </div>
        </div>
        <div class="col-4 mt-3">
            <div class="card-img"><img class="card-img-top rounded mx-auto d-block" src="img/manutencao.png" alt="Manutenção">
                <div class="card-body">
                    <h6 class="card-title text-center mt-2">Manutenção</h6>
                </div>
            </div>
        </div>
        <div class="col-4 mt-3">
            <div class="card-img"><img class="card-img-top rounded mx-auto d-block" src="img/avaria.png" alt="Avaria">
                <div class="card-body">
                    <h6 class="card-title text-center mt-2">Avaria</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!--termina aqui-->
<div class="container-seccao mt-5">
    @foreach($infoCard as $card)
    <div class="card" style="border:none; border-radius:0px">
       
        <div class="row g-0">
            <div class=" col-md-6">
                <img src="img/parceiros.png" class="img-fluid " alt="imagem">
            </div>
            <div class=" col-md-6 text-light" style="background-color:#2C3E4C; position:relative">
                <div class="card-body mt-4">
                    <h5 class="card-title">{{$card->titulo}}</h5>
                    <br>
                    @foreach($tipo_painel as $tipo)
                    <p class="card-text"> <ul><li>{{$tipo->descricao}}</li></ul></p>
                    @endforeach                   
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="container-fluid mt-5">
    @foreach($infoProjetos as $infoProjetos)
    <div class="row">
        <div class="col">
            <div class="titulo text-center">
                <h2>{{$infoProjetos->titulo}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="texto mt-5">
                <p>{{$infoProjetos->descricao}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="projetos">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($nossosprojetos as $projetos)
        <div class="col">            
            <div class="card card-projetos h-100">
                <img src="img/imagem5.png" class="card-img-top" style="width: 100%; height:auto;">
                <div class="card-body">
                    <h5 class="card-title">{{$projetos->titulo}}</h5>
                    <p class="card-text">{{$projetos->descricao}}</p>
                </div>
            </div>
           
        </div>
        @endforeach
    </div>
</div>
<hr class="divisor-rodape">
@endsection


