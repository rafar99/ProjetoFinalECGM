@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Paineis</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <a href="/admin/tipopainel/inserir" class="btn btn-secondary float-right">Novo Tipo de Painel 
          </a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->



    <section class="content">
        <div class="container-fluid">
            <div class="row">

            <section class="col-lg-12 connectedSortable">

          {{----------------------------------------------------------------}}
          {{-----------------Tabela Tipos de Paineis-------------------}}
          {{----------------------------------------------------------------}}

              <div id="tabEmpresa" class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Informação</h3>
      
                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
      
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Painel</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($paineis as $painel)
                          <tr>
                            <td>{{$painel->id}}</td>
                            <td>{{$painel->descricao}}</td>
                            <td>
                                <a href="/admin/tipopainel/edit/{{$painel->id}}" class="btn bg-warning">
                                  <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </section>

          </div>



        </section>
@endsection