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
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($ass as $assistencia)
                          
                          <tr>
                            <td>{{$assistencia->id}}</td>
                            <td>{{$assistencia->painel}}</td>
                            <td>{{$assistencia->dataCriacao}}</td>
                            <td>{{$assistencia->descricao}}</td>
                            <td>{{$assistencia->tipo}}</td>
                            <td>{{$assistencia->estado}}</td>
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
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($assFin as $assistencia)
                          
                          <tr>
                            <td>{{$assistencia->id}}</td>
                            <td>{{$assistencia->painel}}</td>
                            <td>{{$assistencia->dataCriacao}}</td>
                            <td>{{$assistencia->descricao}}</td>
                            <td>{{$assistencia->tipo}}</td>
                            <td>{{$assistencia->estado}}</td>
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
      <!-- /.content -->
      <script src="/backoffice_assets/js/pedidos.js"></script>
@endsection