@extends('layouts.admin-edits')
@if(auth()->user()->tipoUser_id!=1)
  @php
    header("Location: " . URL::to('/admin/dashboard'), true, 302);
    exit();
  @endphp
@endif
@section('title', 'Inserir: Info Início')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">Inserir informação: Início</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/info/inicio" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group">
                  <label for="titulo" class="form-label">Título</label>
                  <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div class="mb-3 form-group">
                  <label for="exampleInputPassword1" class="form-label">Descrição</label>
                  <textarea class="form-control" id="descricao" rows="3" name="descricao"></textarea>
                </div>
                <div class="mb-3 form-group">
                  <label for="formFile" class="form-label">Insira uma imagem</label>
                  <input class="form-control" type="file" id="formFile" name="imagem">
                </div>

                <input type="submit" class="btn btn-primary" value="Guardar" >
                <a href="/admin/info/inicio" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection