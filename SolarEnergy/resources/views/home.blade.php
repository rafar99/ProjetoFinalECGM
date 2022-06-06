@extends('layouts.main')


@section('title', 'SolarEnergy')

@section('content')

@section('title', 'SolarEnergy')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/imagem3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption texto-carrousel">
            <h3>Assistência Técnica</h3>
            <p>Instalação, Manutenção e Avarias</p>
            <button type="button" class="btn btn-success">Começar</button>
          </div>
      </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="titulo text-center">
                <h2>Título</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="texto mt-5">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                    type and scrambled it to make a type specimen book. It has survived not only five centuries,
                    but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                    containing Lorem Ipsum passages,
                    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                    Ipsum.</p>
            </div>
        </div>
    </div>
    <!--Fazer um ciclo para listar -->
    <div class="row justify-content-center icones mt-5">
        <div class="col-4 mt-3">
            <div class="card-img">
                <img class="card-img-top rounded mx-auto d-block" src="img/instalacao.png" alt="Instalação">
                <div class="card-body">
                    <h6 class="card-title text-center">Instalação</h6>
                </div>
            </div>
        </div>
        <div class="col-4 mt-3">
            <div class="card-img"><img class="card-img-top rounded mx-auto d-block" src="img/manutencao.png" alt="Manutenção">
                <div class="card-body">
                    <h6 class="card-title text-center">Manutenção</h6>
                </div>
            </div>
        </div>
        <div class="col-4 mt-3">
            <div class="card-img"><img class="card-img-top rounded mx-auto d-block" src="img/avaria.png" alt="Avaria">
                <div class="card-body">
                    <h6 class="card-title text-center">Avaria</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!--termina aqui-->
<div class="container-seccao mt-5">
    <div class="card" style="border:none; border-radius:0px">
        <div class="row g-0">
            <div class=" col-md-6">
                <img src="img/parceiros.png" class="img-fluid " alt="imagem">
            </div>
            <div class=" col-md-6 text-light" style="background-color:#2C3E4C">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                        galley of type and scrambled it to make a type specimen book.</p>
                        
                        <!--Ver botão acertar distancias em formato desktop-->
                    <button type="button" class="btn btn-success card-button">Ver mais</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="titulo text-center">
                <h2>Nossos Projetos</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="texto mt-5">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley of type and scrambled it to make a type specimen book.</p>
            </div>
        </div>
    </div>
</div>
<div class="projetos">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card card-projetos h-100">
                <img src="img/imagem5.png" class="card-img-top" style="width: 100%; height:auto;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                        to additional content. This content is a little bit longer.</p>
                    <button type="button" class="btn btn-success botao-card">Ver mais</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-projetos h-100">
                <img src="img/imagem6.png" class="card-img-top" style="width: 100%; height:auto;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a short card.</p>
                    <button type="button" class="btn btn-success botao-card">Ver mais</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-projetos h-100">
                <img src="img/imagem7.png" class="imagem card-img-top" style="width: 100%; height:auto;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                        to additional content.</p>
                    <button type="button" class="btn btn-success botao-card">Ver mais</button>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="divisor-rodape">
@endsection



