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
          <h1 class="m-0">Nossos Projetos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <a href="/admin/info/nossosprojetos/inserir" class="btn btn-secondary float-right">Novo: Nossos Projetos 
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
                              <th>Título</th>
                              <th>Descrição</th>
                              <th>Informação</th>
                              <th>Editar</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($infos as $info)
                            <tr>
                              <td>{{$info->id}}</td>
                              <td>{{$info->titulo}}</td>
                              <td>
                                {{strlen($info->descricao) > 50 ? implode(' ', array_slice(explode(' ', $info->descricao),0,10)).'....' : $info->descricao}}
                              </td>
                              <td><button type="button" data-bs-toggle="modal" data-bs-target="#info{{$info->id}}" class="btn btn-primary">Ver mais</button></td>
                            </td>
                              <td>
                                <a href="/admin/info/nossosprojetos/edit/{{$info->id}}" class="btn bg-warning">
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
                              <h5 class="modal-title" id="exampleModalLabel">{{$info->titulo}}</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>{{$info->descricao}}</p>
                              <img src="{{$info->imagem}}" alt="{{$info->titulo}}" class="img-fluid">
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