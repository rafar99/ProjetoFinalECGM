@extends('layouts.admin-edits')

@section('title', 'Atualizar: '. $form_id->nome)

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize"> Alterar estado de: {{$form_id->nome}} - {{$form_id->assunto}}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/formcontactos/update/{{$form_id->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group mt-3">
                <label for="tipoEstado">Estado</label>
                <select name="tipoEstado" id="tipoEstado" class="form-select">
                  @for($i = 0;$i<$countEst;$i++)
                    <option value="{{$estados[$i]->id}}" {{$estados[$i]->id==$form_id->estado_id ? "selected='selected'" : ""}}>{{$estados[$i]->descricao}}</option>
                  @endfor
                </select>
              </div>
              @if(session()->has('error_estado'))
                <div id="alerta" class="alert alert-danger">
                    {{ session()->get('error_estado') }}
                </div>
              @endif
              <input type="submit" class="btn btn-primary" value="Guardar" >
              <a href="/admin/formcontactos" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection