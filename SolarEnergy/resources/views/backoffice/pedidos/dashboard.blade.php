@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$countAss}}</h3>
                  <p>Total de Assistências</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" id="btnTotal" class="small-box-footer">Mostrar Tudo <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$countAssFinalizadas}}</h3>
                  <p>Assistências finalizadas</p>
                </div>
                <div class="icon">
                  <i class="bi bi-bookmark-check"></i>
                </div>
                <a href="#" id="btnFinalizadas" class="small-box-footer">Mostrar tabela <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$countAssAtuais}}</h3>
                  <p>Assistências atuais</p>
                </div>
                <div class="icon">
                  <i class="bi bi-bookmark"></i>
                </div>
                <a href="#" id="btnAtuais" class="small-box-footer">Mostrar tabela <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$countAssPorExecutar}}</h3>
                  <p>Assistências Por Executar</p>
                </div>
                <div class="icon">
                  <i class="bi bi-bookmark"></i>
                </div>
                <a href="#" id="btnPExecutar" class="small-box-footer">Mostrar tabela <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->

            <section class="col-lg-12 connectedSortable">
              <!-- Tabelas aqui-->
              
            {{----------------------------------------------------------------}}
            {{-------------------Tabela Todos os Pedidos----------------------}}
            {{----------------------------------------------------------------}}
              <div id="tabTotal" class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Total de Assistências</h3>
      
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
                            <th>Data do Pedido</th>
                            <th>Descrição</th>
                            <th>Tipo de Pedido</th>
                            <th>Estado</th>
                            <th>Informação</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($assistencias as $assistencia)
                          
                          <tr>
                            <td>{{$assistencia->id}}</td>
                            <td>{{$assistencia->painel}}</td>
                            <td>{{$assistencia->dataCriacao}}</td>
                            <td>{{strlen($assistencia->descricao)>15 ? substr($assistencia->descricao,0,15).'....' : $assistencia->descricao}}</td>
                            <td>{{$assistencia->tipo}}</td>
                            <td>{{$assistencia->estado}}</td>
                            <td>
                              <button type="button" data-bs-toggle="modal" data-bs-target="#info{{$assistencia->id}}" class="btn btn-primary">Ver mais</button>  
                            </td>
                            <td>
                              <a href="/admin/dashboard/edit/{{$assistencia->id}}" class="btn bg-warning text-white" style="color:white">
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

            {{----------------------------------------------------------------}}
            {{-------------------Tabela Pedidos Finalizados-------------------}}
            {{----------------------------------------------------------------}}
              <div id="tabFinalizados" class="row d-none">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Assistências Finalizadas</h3>
      
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
                            <th>Data do Pedido</th>
                            <th>Descrição</th>
                            <th>Tipo de Pedido</th>
                            <th>Estado</th>
                            <th>Informação</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($assFin as $assistencia)
                          
                          <tr>
                            <td>{{$assistencia->id}}</td>
                            <td>{{$assistencia->painel}}</td>
                            <td>{{$assistencia->dataCriacao}}</td>
                            <td>{{strlen($assistencia->descricao)>15 ? substr($assistencia->descricao,0,15).'....' : $assistencia->descricao}}</td>
                            <td>{{$assistencia->tipo}}</td>
                            <td>{{$assistencia->estado}}</td>
                            <td>
                              <button type="button" data-bs-toggle="modal" data-bs-target="#info{{$assistencia->id}}" class="btn btn-primary">Ver mais</button>  
                            </td>
                            <td>
                              <a href="/admin/dashboard/edit/{{$assistencia->id}}" class="btn bg-warning text-white" style="color:white">
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
            {{----------------------------------------------------------------}}
            {{-------------------Tabela Pedidos Atuais------------------------}}
            {{----------------------------------------------------------------}}
              <div id="tabAtuais" class="row d-none">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Assistências a serem Executadas</h3>
      
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
                            <th>Data do Pedido</th>
                            <th>Descrição</th>
                            <th>Tipo de Pedido</th>
                            <th>Estado</th>
                            <th>Informação</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($assAtuais as $assistencia)
                          
                          <tr>
                            <td>{{$assistencia->id}}</td>
                            <td>{{$assistencia->painel}}</td>
                            <td>{{$assistencia->dataCriacao}}</td>
                            <td>{{$assistencia->descricao}}</td>
                            <td>{{$assistencia->tipo}}</td>
                            <td>{{$assistencia->estado}}</td>
                            <td>
                              <button type="button" data-bs-toggle="modal" data-bs-target="#info{{$assistencia->id}}" class="btn btn-primary">Ver mais</button>  
                            </td>
                            <td>
                              <a href="/admin/dashboard/edit/{{$assistencia->id}}" class="btn bg-warning text-white" style="color:white">
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
            {{----------------------------------------------------------------}}
            {{-------------------Tabela Pedidos por Executar------------------}}
            {{----------------------------------------------------------------}}
              <div id="tabPExe" class="row d-none">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Assistências Por Executar</h3>
      
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
                            <th>Data do Pedido</th>
                            <th>Descrição</th>
                            <th>Tipo de Pedido</th>
                            <th>Estado</th>
                            <th>Informação</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($assPExe as $assistencia)
                          
                          <tr>
                            <td>{{$assistencia->id}}</td>
                            <td>{{$assistencia->painel}}</td>
                            <td>{{$assistencia->dataCriacao}}</td>
                            <td>{{$assistencia->descricao}}</td>
                            <td>{{$assistencia->tipo}}</td>
                            <td>{{$assistencia->estado}}</td>
                            <td>
                              <button type="button" data-bs-toggle="modal" data-bs-target="#info{{$assistencia->id}}" class="btn btn-primary">Ver mais</button>  
                            </td>
                            <td>
                              <a href="/admin/dashboard/edit/{{$assistencia->id}}" class="btn bg-warning text-white" style="color:white">
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
              <!-- Modal -->
              @foreach($assistencias as $info)
              <div class="modal fade" id="info{{$info->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">{{$info->tipo}} - {{$info->cliente}}</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h5 class="modal-title"><b>Painel:</b> {{$info->painel}}</h6>
                      <p><b>Data do Pedido:</b> {{$info->dataCriacao}}</p>
                      <p><b>Data do Pedido Efetuado:</b> {{$info->dataExecucao != null ? $info->dataExecucao : "Por Efetuar"}}</p>
                      <p><b>Tempo do Pedido (em H):</b> {{$info->tempoExecucaoEmH != null ? $info->tempoExecucaoEmH : "Por Efetuar"}}</p>
                      <p><b>Morada:</b> {{$info->rua}}, {{$info->porta}}, {{$info->codigo_postal}} - {{$info->concelho}} </p>
                      {{-- <p><b>Disponibilidade:</b> {{$info->disponibilidade}}</p> --}}
                      <p><b>Descrição:</b> {{$info->descricao}}</p>
                      <p><b>Tipo de Pedido:</b> {{$info->tipo}}</p>
                      <p><b>Estado:</b> {{$info->estado}}</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </section>

          </div>
      </section>
      <!-- /.content -->
      <script src="/backoffice_assets/js/pedidos.js"></script>
@endsection