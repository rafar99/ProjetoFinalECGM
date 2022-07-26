@extends('layouts.admin-edits')

@section('title', 'Atualizar: '. $user->name)

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize"> A editar: {{$user->name}}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/users/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group mt-3">
                <label for="tipoUser">Tipo de Utilizador</label>
                <select name="tipoUser" id="tipoUser" class="form-select">
                  @foreach($tipos as $tipo)
                  <option value="{{$tipo->id}}" {{$tipo->id==$user->tipoUser_id ? "selected='selected'" : ""}}>{{$tipo->descricao}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group mt-3">
                <label for="ativo">Estado: {{$user->ativo==1 ? "Ativada" : "Desativada"}} </label>
                <select name="ativo" id="ativo" class="form-select">
                  <option value="0">Desativar</option>
                  <option value="1" {{$user->ativo==1 ? "selected='selected'" : ""}}>Ativar</option>
                </select>
              </div>
              @if(session()->has('error'))
                <div id="alerta" class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
              @endif
              <input type="submit" class="btn btn-primary" value="Guardar" >
              <a href="/admin/users" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection