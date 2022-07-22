@extends('layouts.admin')
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
          <h1 class="m-0">Tipos de Clientes</h1>
        </div>
        <div class="col-sm-6">
          <a href="/admin/tipocliente/inserir" class="btn btn-secondary float-right">Novo Tipo de Cliente
          </a>
        </div>
      </div>
    </div>
  </div>



    <section class="content">
        <div class="container-fluid">
            <div class="row">

            <section class="col-lg-12 connectedSortable">

          {{----------------------------------------------------------------}}
          {{--------------------Tabela Tipo Clientes------------------------}}
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
                            <th>Cliente</th>
                            <th>Editar</th>
                            <th>Apagar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($clientes as $cliente)
                          <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->descricao}}</td>
                            <td>
                                <a href="/admin/tipocliente/edit/{{$cliente->id}}" class="btn bg-warning">
                                  <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <a href="" class="btn bg-danger">
                                  <i class="bi bi-x-square"></i>
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