@extends('layouts.main')

@section('title', 'SolarEnergy')

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
            <form>
                <div class="form-group">
                    <input type="name" class="form-control" id="nome" placeholder="Nome">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mt-3">
                            <input type="name" class="form-control" id="rua" placeholder="Rua">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mt-3">
                            <input type="name" class="form-control" id="nPorta" placeholder="Nº Porta">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mt-3">
                            <input type="name" class="form-control" id="codPostal" placeholder="Código-Postal">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mt-3">
                            <input type="name" class="form-control" id="concelho" placeholder="Concelho">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mt-3">
                            <input type="name" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mt-3">
                            <input type="name" class="form-control" id="contacto" placeholder="Contacto">
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="tipo_painel">Tipo Painel</label>
                    <select class="form-control" id="tipoPainel">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="tipo_assistencia">Tipo de Assistência</label>
                    <select class="form-control" id="tipoAssistencia">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
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
                            <input type="date" class="form-control" id="data">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mt-2">
                            <input type="time" class="form-control" id="hora">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" id="mensagem" rows="5" placeholder="Descrição"></textarea>
                </div>
                <button type="button" class="btn btn-success mt-4 botao-form">Enviar</button>
            </form>
        </div>
    </div>
</div>
<hr class="divisor-rodape">
@endsection
