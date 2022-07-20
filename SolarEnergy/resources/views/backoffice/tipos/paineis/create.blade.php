@extends('layouts.admin-edits')

@section('title', 'Inserir: Tipo Painel')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">Inserir informação: Tipo de Painel</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/tipopainel" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group">
                  <label for="descricao" class="form-label">Tipo de Painel</label>
                  <input type="text" class="form-control" id="tipoPainel" name="descricao" required>
                </div>
               
                <input type="submit" class="btn btn-primary" value="Guardar" >
                <a href="/admin/tipopainel" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection