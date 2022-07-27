@extends('layouts.admin-edits')

@section('title', 'Novo Funcionário')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">Novo Funcionário</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->
        @if(session()->has('error'))
        <div id="alerta" class="text-center alert alert-danger">
          {{session()->get('error')}}  
        </div> 
        @endif
        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/users" method="POST" enctype="multipart/form-data">
                @csrf

                {{--Inserir no funcionario--}}
                <div class="mb-3 form-group">
                  <label for="nome" class="form-label">Nome Completo</label>
                  <input type="text" class="form-control" id="nome" name="nomecompleto" required>
                </div>
                <div class="row">
                    <div class="mb-3 form-group col-md-6">
                      <label for="contacto" class="form-label">Contacto</label>
                      <input type="text" class="form-control" id="contacto" name="contacto" required>
                    </div>
                    
                    <div class="mb-3 form-group col-md-6">
                        <label for="contacto" class="form-label">Função</label>
                        <select name="funcao" class="form-select" id="funcao">
                        @foreach($funcoes as $funcao)
                            <option value="{{ $funcao->id }}">{{ $funcao->descricao }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                      <label for="formFile" class="form-label"> *Insirir foto:</label>
                      <span class="badge badge-secondary ms-3">Opcional</span>
                     
                      <input class="form-control" type="file" id="formFile" name="image">
                    </div>
                </div>
                <hr>

                {{--Inserir no users--}}
                <div class="mb-3 form-group">
                  <label for="name" class="form-label">Nome de utilizador</label>
                  <input type="name" class="form-control" id="name" name="name" required>
                </div>
   
                <div class="mb-3 form-group">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3 form-group">
                  <label for="password" class="form-label">Palavra-passe</label>
                  <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
                </div>

                <div class="mb-3 form-group">
                  <label for="password_confirmation" class="form-label">Confirmar Palavra-passe</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                </div>
                

                <input type="submit" class="btn btn-primary" value="Inserir" >
                <a href="/admin/users" class="btn btn-danger float-right">Voltar</a>
                @if($errors->any())
                    {{ implode('', $errors->all(':message')) }}
                @endif
              </form>
            </div>
          </div>
        </div>


@endsection