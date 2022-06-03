@extends('layouts.main')

@section('title', 'SolarEnergy')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/banner.jpg" class="d-block w-100">
        </div>
    </div>
</div>
<div class="container-fluid mt-5">
    <div class="seccaoinicio">
        <div class="row">
            <div class="col-md-8">
                <h2>Título</h2>
                <p class="paragrafo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                    type and scrambled it to make a type specimen book. It has survived not only five centuries,
                    but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <button type="button" class="btn btn-success">Ver mais</button>
            </div>
            <div class="col-md-4 text-center">
                <img src="img/imagem2.jpg" class="img-fluid" style="width: 20vw">
            </div>
        </div>
        <div class="row my-5">
            <div class="col">
                <div class="titulo text-center">
                    <h2>Equipa</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="texto">
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
        <div class="projetos">
            <div class="row row-cols-1 row-cols-md-3 g-4 my-5">
                <div class="col">
                    <div class="card card-projetos h-100">
                        <img src="img/imagem8.jpg" class="card-img-top" style="width: 100%; height:auto;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-projetos h-100">
                        <img src="img/imagem8.jpg" class="card-img-top" style="width: 100%; height:auto;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a short card.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-projetos h-100">
                        <img src="img/imagem8.jpg" class="imagem card-img-top" style="width: 100%; height:auto;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                to additional content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
