@extends('layouts.admin-edits')

@section('title', 'Atualizar: '. $estado_id->descricao)
@if(auth()->user()->tipoUser_id!=1)
  @php
    header("Location: " . URL::to('/admin/dashboard'), true, 302);
    exit();
  @endphp
@endif
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize"> Alterar estado: {{$estado_id->descricao}}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/tipoestado/update/{{$estado_id->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group mt-3">
                <label for="tipoEstado" class="form-label">Estado</label>
                <input class="form-control" type="text" name="tipoEstado" value="{{$estado_id->descricao}}">
              </div>
              {{-- @if(session()->has('error_estado'))
                <div class="alert alert-danger">
                    {{ session()->get('error_estado') }}
                </div>
              @endif --}}
              <input type="submit" class="btn btn-primary" value="Guardar" >
              <a href="/admin/tipoestado" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection