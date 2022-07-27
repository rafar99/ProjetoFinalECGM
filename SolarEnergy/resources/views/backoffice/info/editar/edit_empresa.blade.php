@extends('layouts.admin-edits')
@if(auth()->user()->tipoUser_id!=1)
  @php
    header("Location: " . URL::to('/admin/dashboard'), true, 302);
    exit();
  @endphp
@endif
@section('title', 'Editar: Empresa')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">Editar informação: Empresa - id: {{$empresa->id}}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/info/empresa/update/{{$empresa->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 form-group">
                  <label for="titulo" class="form-label">Título</label>
                  <input type="text" class="form-control" id="titulo" name="titulo" value="{{$empresa->titulo}}">
                </div>
                <div class="mb-3 form-group">
                  <label for="exampleInputPassword1" class="form-label">Descrição</label>
                  <textarea class="form-control" id="descricao" rows="3" name="descricao">{{$empresa->descricao}}</textarea>
                </div>
                <div class="mb-3 form-group">
                  <label for="formFile" class="form-label me-3">Atualizar imagem:</label>
                  @if ($empresa->imagem != null)
                  <img src="{{ url('img/'.$empresa->imagem) }}" alt="{{$empresa->titulo}}" class="img-fluid mb-3" width="20%">
                  @endif
                  <input class="form-control" type="file" id="formFile" name="imagem">
                </div>

                <input type="submit" class="btn btn-primary" value="Guardar" >
                <a href="/admin/info/empresa" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection