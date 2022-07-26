@extends('layouts.main')

@section('title', 'SolarEnergy')
@section('imgcontacto', '/img/contacto.svg')
@section('imgfacebook', '/img/facebook.svg')
@section('imglinkedin', '/img/facebook.svg')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/banner.jpg" class="d-block w-100">
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="container-seccao mt-5">
                <div class="card" style="border:none; border-radius:0px">
                    <div class="row g-0">
                        <div class=" col-md-6" style="position:relative">
                            @foreach($quemsomos as $somos)
                            <div class="card-body">
                                <h2 class="titulo">{{$somos->titulo}}</h2>
                                <p class="card-text mt-5" style="text-align: justify">{{$somos->descricao}}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class=" col-md-6">
                            <img src="img/imagem10.jpg" class="img-fluid " alt="imagem">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($equipa as $team)
    <div class="row my-5">
        <div class="col">
           
            <div class="titulo text-center mt-5">
                <h2>{{$team->titulo}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
          
            <div class="texto">
                <p>{{$team->descricao}}</p>
            </div>
        </div>
    </div>
    @endforeach
    <div class="equipa">
        <div class="row row-cols-1 row-cols-md-3 g-4 my-2">
            @foreach ($funcionarios as $funcionario)
            <div class="col-md-3">
                <div class="card card-projetos h-100">
                    <img src="backoffice_assets/dist/img/func/{{$funcionario->foto}}" class="card-img-top" style="width: 100%; height:auto;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$funcionario->nome}}</h5>
                        <p class="card-text text-center">{{$funcionario->funcao}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<hr class="divisor-rodape">
@endsection
