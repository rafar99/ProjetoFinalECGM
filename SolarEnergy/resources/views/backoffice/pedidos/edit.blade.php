@extends('layouts.admin-edits')

@section('title', 'Atualizar: '. $pedido->id)

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize"> Pedido: {{$pedido->id}} - {{$pedido->painel}}- {{$pedido->dataCriacao}}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/dashboard/update/{{$pedido->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group mt-3">
                <label for="tipoEstado">Estado</label>
                <select name="tipoEstado" id="tipoEstado" class="form-select">
                  @for($i = 0;$i<$countEstados;$i++)
                    <option value="{{$tipos[$i]->id}}" {{$tipos[$i]->id==$pedido->estado ? "selected='selected'" : ""}}>{{$tipos[$i]->descricao}}</option>
                  @endfor
                </select>
              </div>
              <div class="form-group mt-3">
                <label for="DataExecucao">Data de Execução do Pedido</label>
                <input type="date" class="form-control" name="dataExecucao" id="dataExecucao" value="{{$pedido->dataExecucao ==null ? "" : $pedido->dataExecucao}}">
              </div>
              <div class="form-group mt-3">
                <label for="TempoExecucao">Tempo de Execução do Pedido</label>
                <input type="number" class="form-control" name="tempoExecucaoEmH" id="tempoExecucao" value="{{$pedido->tempoExecucaoEmH ==null ? "" : $pedido->tempoExecucaoEmH}}" >
              </div>
              @if(session()->has('error'))
                <div id="alerta" class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
              @endif
              <input type="submit" class="btn btn-primary" value="Guardar" >
              <a href="/admin/dashboard" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection