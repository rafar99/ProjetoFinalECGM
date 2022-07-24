@extends('layouts.main')

@section('title', 'SolarEnergy')
@section('imgcontacto', '/img/contacto.svg')
@section('imgfacebook', '/img/facebook.svg')
@section('imglinkedin', '/img/facebook.svg')

@section('content')
@if(auth()->user()!=null && auth()->user()->tipoUser_id!=2 )
  @php
  var_dump(auth()->user());
    header("Location: " . URL::to('/dashboard'), true, 302);
    exit();
  @endphp
@endif
<div class="container-fluid mt-5">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col">
                <div class="perfil">
                    <h5>Editar Dados:{{$cliente->nome}} </h5>
                </div>
                <div class="infoCliente mt-5">
                    <form action="/areacliente/editarcliente/update/{{$cliente->id}}" method="POST" class="row g-3">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                          <label for="title" class="form-label">Nome</label>
                          <input type="text" class="form-control" id="nome" name="nome" value="{{$cliente->nome}}">
                        </div>
                        <div class="col-md-6">
                            <label for="title" class="form-label">Contacto</label>
                            <input type="text" class="form-control" id="contacto"name="contacto" value="{{$cliente->contacto}}">
                        </div>
                        <div class="col-md-6">
                            <label for="title" class="form-label">NIF</label>
                            <input type="text" class="form-control" id="nif" name="nif" value="{{$cliente->nif}}">
                        </div>
                        <div class="form-group">
                            <label for="title">Tipo de Cliente</label>
                              <select class="form-select" id="tipoCliente" name="tipoCliente">
                                @foreach ($tipoCliente as $tipo)
                                    <option value="{{$tipo->id}}"{{$tipo->id==$cliente->tipoCliente ? "selected='selected'": ""}}>{{$tipo->descricao}}</option>
                                @endforeach
                            </select>  
                            
                          </div>
                        <div class="col-12">
                          <label for="title" class="form-label">Morada</label>
                          <input type="text" class="form-control" id="morada" name="morada" placeholder="Rua das Cambalhotas nº 222 Meadela Viana do Castelo" value="{{$cliente->morada}}">
                        </div>
                        <div class="col-12 text-end">
                          <button type="submit" class="btn btn-success mt-4">Guardar</button>
                          <a href="{{url()->previous()}}"><button type="button" class="btn btn-secondary mt-4">Voltar</button></a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="divisor-rodape">
@endsection
