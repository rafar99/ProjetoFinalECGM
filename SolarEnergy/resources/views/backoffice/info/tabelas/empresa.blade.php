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
              <h1 class="m-0">Informação Página: Empresa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <a href="/admin/info/empresa/inserir" class="btn btn-secondary float-right">Novo: Empresa 
              </a>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <section class="content">
        <div class="container-fluid">
            <div class="row">

            <section class="col-lg-12 connectedSortable">

          {{----------------------------------------------------------------}}
          {{-----------------Tabela Informação: Empresa-------------------}}
          {{----------------------------------------------------------------}}
          @if(session()->has('msg_create'))
          <div id="alerta" class="text-center alert alert-success">
            {{session()->get('msg_create')}}
          </div>
          @elseif(session()->has('msg_none'))
          <div id="alerta" class="text-center alert alert-warning">
            {{session()->get('msg_none')}}  
          </div>  
          @elseif(session()->has('msg_edit'))
          <div id="alerta" class="text-center alert alert-success">
            {{session()->get('msg_edit')}}  
          </div>  
          @elseif(session()->has('msg_delete'))
          <div id="alerta" class="text-center alert alert-danger">
            {{session()->get('msg_delete')}}  
          </div> 
          @endif 
              <div id="tabEmpresa" class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Informação</h3>
      
                      <div class="card-tools">
                        {{-- <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
      
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div> --}}
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
                            <th>Eliminar</th>
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
                              <a href="/admin/info/empresa/edit/{{$info->id}}" class="btn bg-warning">
                                <i class="bi bi-pencil-square"></i>
                              </a>
                            </td>
                            <td>
                              <form action="/admin/info/empresa/{{$info->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-danger"><i class="bi bi-x-square"></i></button>
                              </form>
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
                                <p><b>Descrição: </b>{{$info->descricao != null ? $info->descricao : "Sem Descrição"}}</p>
                                @if ($info->imagem != null)
                                <p><b>Imagem: </b></p>
                                <img src="{{ url('img/'.$info->imagem) }}" alt="{{$info->titulo}}" class="img-fluid">
                                @else
                                <p><b>Imagem: </b> Sem Imagem</p>
                                @endif
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