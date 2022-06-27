@extends('layouts.admin')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Utilizadores</h1>
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
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>4</h3>
  
                  <p>Número de Utilizadores</p>
                </div>
                <div class="icon">
                  <i class="bi bi-people-fill"></i>
                </div>
                <a href="#" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>3</h3>
                  <p>Número de Administratores e Funcionários</p>
                </div>
                <div class="icon">
                  <i class="bi bi-person-badge"></i>
                </div>
                <a href="#" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>1</h3>
                  <p>Número de Clientes</p>
                </div>
                <div class="icon">
                  <i class="bi bi-person-workspace"></i>
                </div>
                <a href="#" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->



          <!-- Main row -->
          <div class="row">

            <section class="col-lg-12 connectedSortable">
  
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Todos os Utilizadores</h3>
      
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
                            <th>Passes</th>
                            <th>Tipo de Utilizador</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($utilizadores as $utilizador)
                          <tr>
                            <td>{{$utilizador->id}}</td>
                            <td>{{$utilizador->nome}}</td>
                            <td>{{$utilizador->email}}</td>
                            <td>{{$utilizador->password}}</td>
                            <td>{{$utilizador->descricao}}</td>
                            <td>
                              <button class="btn bg-warning text-white" style="width:40px; heigth: 40px; margin:2px">
                                <a href="/admin/users/edit/{{$utilizador->id}}" style="color:white">
                                  <i class="bi bi-pencil-square"></i>
                                </a>
                            </button>
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
      <!-- /.content -->
@endsection