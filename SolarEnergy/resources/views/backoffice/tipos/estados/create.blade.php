@extends('layouts.admin-edits')
@if(auth()->user()->tipoUser_id!=1)
  @php
    header("Location: " . URL::to('/admin/dashboard'), true, 302);
    exit();
  @endphp
@endif
@section('title', 'Inserir: Tipo Estado')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">Inserir informação: Tipo de Estado</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/tipoestado" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group">
                  <label for="descricao" class="form-label">Tipo de Estado</label>
                  <input type="text" class="form-control" id="tipoEstado" name="descricao" required>
                </div>
               
                <input type="submit" class="btn btn-primary" value="Guardar" >
                <a href="/admin/tipoestado" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection