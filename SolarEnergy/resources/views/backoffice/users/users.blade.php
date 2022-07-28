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
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$countUtilizadores}}</h3>
  
                  <p>Total de Utilizadores</p>
                </div>
                <div class="icon">
                  <i class="bi bi-people-fill"></i>
                </div>
                <a href="#" id="btnTodos" class="small-box-footer">Mostrar todos <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$countAdmins}}</h3>
                  <p>Total de Administratores</p>
                </div>
                <div class="icon">
                  <i class="bi bi-person-badge"></i>
                </div>
                <a href="#" id="btnAdmin" class="small-box-footer">Mostrar tabela <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$countTecnicos}}</h3>
                  <p>Total de Funcionários</p>
                </div>
                <div class="icon">
                  <i class="bi bi-person-badge"></i>
                </div>
                <a href="#" id="btnTecnicos" class="small-box-footer">Mostrar tabela <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$countClientes}}</h3>
                  <p>Total de Clientes</p>
                </div>
                <div class="icon">
                  <i class="bi bi-person-workspace"></i>
                </div>
                <a href="#" id="btnClientes" class="small-box-footer">Mostrar tabela <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->

          <div class="row">

            <section class="col-lg-12 connectedSortable">

          {{----------------------------------------------------------------}}
          {{-----------------Tabela Todos os Utilizadores-------------------}}
          {{----------------------------------------------------------------}}

              @if(session()->has('msg_create_func'))
              <div id="alerta" class="text-center alert alert-success">
                {{session()->get('msg_create_func')}}
              </div>
              @elseif(session()->has('msg_edit_estado'))
              <div id="alerta" class="text-center alert alert-success">
                {{session()->get('msg_edit_estado')}}  
              </div>
              @endif 
              <div id="tabTodos" class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Todos os Utilizadores</h3>
      
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
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Tipo de Utilizador</th>
                            <th>Estado</th>
                            @if(auth()->user()->tipoUser_id==1)
                            <th>Editar</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($utilizadores as $utilizador)
                          <tr>
                            <td>{{$utilizador->id}}</td>
                            <td>{{$utilizador->name}}</td>
                            <td>{{$utilizador->email}}</td>
                            <td>{{$utilizador->descricao}}</td>
                            <td>
                              {{$utilizador->ativo==1 ? 'Conta Ativada' : "Conta Desativada"}}
                            </td>
                            @if(auth()->user()->tipoUser_id==1)
                            <td>
                              <a href="{{url('/admin/users/edit/' . $utilizador->id)}}" class="btn bg-warning text-white" style="color:white">
                                <i class="bi bi-pencil-square"></i>
                              </a>
                            </td>
                            @endif
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
          {{-------------------------Tabela Admins--------------------------}}
          {{----------------------------------------------------------------}}
              <div id="tabAdmin" class="row d-none">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Administradores</h3>
      
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
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Tipo de Utilizador</th>
                            <th>Estado</th>
                            @if(auth()->user()->tipoUser_id==1)
                            <th>Editar</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($admins as $utilizador)
                          <tr>
                            <td>{{$utilizador->id}}</td>
                            <td>{{$utilizador->name}}</td>
                            <td>{{$utilizador->email}}</td>
                            <td>{{$utilizador->descricao}}</td>
                            <td>
                              {{$utilizador->ativo==1 ? 'Conta Ativada' : "Conta Desativada"}}
                            </td>
                            @if(auth()->user()->tipoUser_id==1)
                            <td>
                              <a href="/admin/users/edit/{{$utilizador->id}}" class="btn bg-warning text-white" style="color:white">
                                <i class="bi bi-pencil-square"></i>
                              </a>
                            </td>
                            @endif
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
              {{-------------------------Tabela Tecnicos------------------------}}
              {{----------------------------------------------------------------}}
              <div id="tabTecnicos" class="row d-none">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Técnicos</h3>
      
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
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Tipo de Utilizador</th>
                            <th>Estado</th>
                            <th>Informação</th>
                            @if(auth()->user()->tipoUser_id==1)
                            <th>Editar</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tecnicos as $utilizador)
                          <tr>
                            <td>{{$utilizador->id}}</td>
                            <td>{{$utilizador->name}}</td>
                            <td>{{$utilizador->email}}</td>
                            <td>{{$utilizador->tipo}}</td>
                            <td>
                              {{$utilizador->ativo==1 ? 'Conta Ativada' : "Conta Desativada"}}
                            </td>
                            <td>
                              <button type="button" data-bs-toggle="modal" data-bs-target="#info{{$utilizador->id}}" class="btn btn-primary">Ver mais</button>
                            </td>
                            @if(auth()->user()->tipoUser_id==1)
                            <td>
                              <a href="/admin/users/edit/{{$utilizador->id}}" class="btn bg-warning text-white" style="color:white">
                                <i class="bi bi-pencil-square"></i>
                              </a>
                            </td>
                            @endif
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                      <!-- Modal -->
                      @foreach($tecnicos as $utilizador)
                        @foreach($tecnicosFuncao as $funcao)
                          @if($utilizador->fid == $funcao->fid)
                            <div class="modal fade" id="info{{$utilizador->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$utilizador->name}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p><b>Nome completo:</b> {{$utilizador->nome}}</p>
                                    <p><b>Email:</b> {{$utilizador->email}}</p>
                                    <p><b>Data de Registo:</b> {{$utilizador->dataRegisto}}</p>
                                    <p><b>Função:</b> {{$funcao->tipo}}</p>
                                    <p><b>Estado:</b> {{$utilizador->ativo==1 ? 'Conta Ativada' : "Conta Desativada"}}</p>
                                    <p><b>Foto:</b> {{$utilizador->foto !='perfil.png' && $utilizador->foto !=null  ? '' : "Sem foto"}}</p>
                                    @if ($utilizador->foto != null && $utilizador->foto !=null)
                                    <img src="{{ url('backoffice_assets/dist/img/func/'.$utilizador->foto) }}" alt="{{$utilizador->nome}}" class="img-fluid mb-3" width="20%">
                                    @endif
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endif
                        @endforeach
                      @endforeach


                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>

          {{----------------------------------------------------------------}}
          {{----------------------Tabela Clientes---------------------------}}
          {{----------------------------------------------------------------}}

              <div id="tabClientes" class="row d-none">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Clientes</h3>
      
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
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Tipo de Utilizador</th>
                            <th>Estado</th>
                            <th>Informação</th>
                            @if(auth()->user()->tipoUser_id==1)
                            <th>Editar</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($clientes as $utilizador)
                          <tr>
                            <td>{{$utilizador->id}}</td>
                            <td>{{$utilizador->name}}</td>
                            <td>{{$utilizador->email}}</td>
                            <td>{{$utilizador->tipo}}</td>
                            <td>
                              {{$utilizador->ativo==1 ? 'Conta Ativada' : "Conta Desativada"}}
                            </td>
                            <td>
                              <button type="button" data-bs-toggle="modal" data-bs-target="#info{{$utilizador->id}}" class="btn btn-primary">Ver mais</button>
                            </td>
                            @if(auth()->user()->tipoUser_id==1)
                            <td>
                              <a href="/admin/users/edit/{{$utilizador->id}}" class="btn bg-warning text-white" style="color:white">
                                <i class="bi bi-pencil-square"></i>
                              </a>
                            </td>
                            @endif
                          </tr>
                          @endforeach
                        </tbody>
                      </table>


                      <!-- Modal -->
                      @foreach($clientes as $utilizador)
                      @foreach($clienteTipo as $tipo)
                        @if($utilizador->cid == $tipo->cid)
                          <div class="modal fade" id="info{{$utilizador->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">{{$utilizador->name}}</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p><b>Nome completo:</b> {{$utilizador->nome}}</p>
                                  <p><b>Email:</b> {{$utilizador->email}}</p>
                                  <p><b>Morada:</b> {{$utilizador->morada}}</p>
                                  <p><b>NIF:</b> {{$utilizador->nif}}</p>
                                  <p><b>Data de Registo:</b> {{$utilizador->dataRegisto}}</p>
                                  <p><b>Cliente:</b> {{$tipo->tipo}}</p>
                                  <p><b>Estado:</b> {{$utilizador->ativo==1 ? 'Conta Ativada' : "Conta Desativada"}}</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endif
                      @endforeach
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
      <!-- /.content -->


      
      <script src="/backoffice_assets/js/utilizadores.js"></script>
@endsection