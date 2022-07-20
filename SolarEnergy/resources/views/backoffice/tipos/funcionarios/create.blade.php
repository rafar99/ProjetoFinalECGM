@extends('layouts.admin-edits')

@section('title', 'Inserir: Tipo Funcionário')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">Inserir informação: Tipo de Funcionário</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/tipofuncionario" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group">
                  <label for="descricao" class="form-label">Tipo de Funcionário</label>
                  <input type="text" class="form-control" id="tipoFuncionario" name="descricao" required>
                </div>
               
                <input type="submit" class="btn btn-primary" value="Guardar" >
                <a href="/admin/tipofuncionario" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection