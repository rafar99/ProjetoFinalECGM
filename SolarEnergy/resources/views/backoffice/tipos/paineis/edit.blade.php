@extends('layouts.admin-edits')
@if(auth()->user()->tipoUser_id!=1)
  @php
    header("Location: " . URL::to('/admin/dashboard'), true, 302);
    exit();
  @endphp
@endif
@section('title', 'Atualizar: '. $painel_id->descricao)

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize"> Alterar Painel: {{$painel_id->descricao}}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/tipopainel/update/{{$painel_id->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group mt-3">
                <label for="tipoPainel" class="form-label">Painel</label>
                <input class="form-control" type="text" name="tipoPainel" value="{{$painel_id->descricao}}">
              </div>
              @if(session()->has('error'))
                <div id="alerta" class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
              @endif
              <input type="submit" class="btn btn-primary" value="Guardar" >
              <a href="/admin/tipopainel" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection