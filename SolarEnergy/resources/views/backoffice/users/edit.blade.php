@extends('layouts.admin-edits')

@section('title', 'Atualizar: '. $user->name)

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize"> A editar: {{$user->name}}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/users/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              {{--Se tipo de utilizador for um tecnico...--}}
              @if($user->tipoUser_id==3)
              {{--NOME COMLETO--}}
              <div class="mb-3 form-group">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nomecompleto" value={{$funcionario->nome}}>
              </div>
              <div class="row">
                {{--CONTACTO--}}
                <div class="mb-3 form-group col-md-6">
                  <label for="contacto" class="form-label">Contacto</label>
                  <input type="text" class="form-control" id="contacto" name="contacto" value='{{$funcionario->contacto}}'>
                </div>
                {{--FUNÇÃO--}}
                <div class="form-group col-md-6">
                  <label for="tipoFunc">Função</label>
                  <select name="tipoFunc" id="tipoFunc" class="form-select">
                    @foreach($funcs as $tipo_func)
                    <option value="{{$tipo_func->id}}" {{$tipo_func->id==$funcionario->tipoFuncionario_id ? "selected='selected'" : ""}}>{{$tipo_func->descricao}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              {{--FOTO--}}
              <div class="mb-3 form-group">
                <label for="formFile" class="form-label"> Atualizar foto:</label>    
                @if ($funcionario->foto != null && $funcionario->foto != 'perfil.png')
                <img src="{{ url('backoffice_assets/dist/img/func/'.$funcionario->foto) }}" alt="{{$funcionario->foto}}" class="img-fluid mb-3" width="10%">
                @endif           
                <input class="form-control" type="file" id="formFile" name="foto">
              </div>
              <hr>
              @endif
              <div class="form-group mt-3">
                <label for="tipoUser">Tipo de Utilizador</label>
                <select name="tipoUser" id="tipoUser" class="form-select">
                  @foreach($tipos as $tipo)
                  <option value="{{$tipo->id}}" {{$tipo->id==$user->tipoUser_id ? "selected='selected'" : ""}}>{{$tipo->descricao}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group mt-3">
                <label for="ativo">Estado: {{$user->ativo==1 ? "Ativada" : "Desativada"}} </label>
                <select name="ativo" id="ativo" class="form-select">
                  <option value="0">Desativar</option>
                  <option value="1" {{$user->ativo==1 ? "selected='selected'" : ""}}>Ativar</option>
                </select>
              </div>
              
              @if(session()->has('error'))
                <div id="alerta" class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
              @endif
              <input type="submit" class="btn btn-primary" value="Guardar" >
              <a href="/admin/users" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection