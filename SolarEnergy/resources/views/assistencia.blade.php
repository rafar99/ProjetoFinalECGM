@extends('layouts.main')

@section('title', 'SolarEnergy')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/imagem1.jpg" class="d-block w-100">
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
            <div class="col">
                <form>
                    <div class="form-group">
                        <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Nome">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mt-3">
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Rua">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mt-3">
                                <input type="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Nº Porta">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mt-3">
                                <input type="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Código-Postal">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mt-3">
                                <input type="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Concelho">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mt-3">
                                <input type="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mt-3">
                                <input type="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Contacto">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="exampleFormControlSelect1">Tipo Painel</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleFormControlSelect1">Tipo de Assistência</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mt-3">
                                <label for="exampleFormControlSelect1">Disponibilidade do Cliente</label>
                                <input type="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="&#xF1F6">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mt-3">
                                <label for="exampleFormControlSelect1"></label>
                                <input type="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="&#xF293">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Descrição"></textarea>
                    </div>
                    <button type="button"
                        class="btn btn-success mt-4 bt-form">Submeter</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
