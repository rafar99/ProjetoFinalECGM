@extends('layouts.admin-edits')

@section('title', 'Atualizar: '. $funcionario_id->descricao)

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize"> Alterar funcionário: {{$funcionario_id->descricao}}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/tipofuncionario/update/{{$funcionario_id->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group mt-3">
                <label for="tipofuncionario" class="form-label">Funcionário</label>
                <input class="form-control" type="text" name="tipoFuncionario" value="{{$funcionario_id->descricao}}">
              </div>
              {{-- @if(session()->has('error_funcionario'))
                <div class="alert alert-danger">
                    {{ session()->get('error_funcionario') }}
                </div>
              @endif --}}
              <input type="submit" class="btn btn-primary" value="Guardar" >
              <a href="/admin/tipofuncionario" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection