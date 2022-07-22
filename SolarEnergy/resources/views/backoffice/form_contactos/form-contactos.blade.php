@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Contactos</h1>
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
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Assunto</th>
                            <th>Data</th>
                            <th>Mensagem</th>
                            <th>Estado</th>
                            <th>Informação</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($infos as $info)
                          <tr>
                            <td>{{$info->id}}</td>
                            <td>{{$info->nome}}</td>
                            <td>{{$info->email}}</td>
                            <td>{{$info->assunto}}</td>
                            <td>{{$info->data}}</td>
                            <td>
                              {{strlen($info->mensagem) > 50 ? implode(' ', array_slice(explode(' ', $info->mensagem),0,10)).'....' : $info->mensagem}}
                            </td>
                            <td>{{$info->descricao}}</td>
                            <td><button type="button" data-bs-toggle="modal" data-bs-target="#info{{$info->id}}" class="btn btn-primary">Ver mais</button></td>
                            <td>
                                <a href="/admin/formcontactos/edit/{{$info->id}}" class="btn bg-warning">
                                  <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                      <!-- Modal -->
                      @foreach($infos as $info)
                      <div class="modal fade" id="info{{$info->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel">{{$info->nome}}</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <h5 class="modal-title"><b>Assunto:</b> {{$info->assunto}}</h6>
                              <p><b>Email:</b> {{$info->email}}</p>
                              <p><b>Data:</b> {{$info->data}}</p>
                              <p><b>Mensagem:</b> {{$info->mensagem}}</p>
                              <p><b>Estado:</b> {{$info->descricao}}</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach

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