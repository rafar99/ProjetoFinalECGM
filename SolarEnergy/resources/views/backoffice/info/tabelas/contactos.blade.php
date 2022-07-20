@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Contactos</h1>
            </div><!-- /.col -->  
            <div class="col-sm-6">
              <a href="/admin/info/contactos/inserir" class="btn btn-secondary float-right">Novo: Contacto 
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
              {{-----------------Tabela Informação: Empresa-------------------}}
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
                                <th>Telemóvel</th>
                                <th>Morada</th>
                                <th>Email</th>
                                <th>Mapa</th>
                                <th>Editar</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($infos as $info)
                              <tr>
                                <td>{{$info->id}}</td>
                                <td>{{$info->num_telefone}}</td>
                                <td>{{$info->morada}}</td>
                                <td>{{$info->email}}</td>
                                <td>{{$info->mapa}}</td>
                                <td>
                                    <a href="/admin/info/contactos/edit/{{$info->id}}" class="btn bg-warning">
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