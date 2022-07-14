@extends('layouts.admin-edits')

@section('title', 'Editar: Contactos')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">Editar informação: Contacto - id: {{$contactos->id}}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/info/contactos/update/{{$contactos->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 form-group">
                  <label for="telefone" class="form-label">Telemóvel/Telefone</label>
                <input type="text" class="form-control" id="telefone" name="num_telefone" value="{{$contactos->num_telefone}}">
                </div>
                <div class="mb-3 form-group">
                  <label for="morada" class="form-label">Morada</label>
                  <input class="form-control" id="morada" name="morada" value="{{$contactos->morada}}">
                </div>
                <div class="mb-3 form-group">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{$contactos->email}}">
                </div>
                <div class="mb-3 form-group">
                  <label for="mapa" class="form-label">mapa</label>
                  <input type="text" class="form-control" id="mapa" name="mapa" value="{{$contactos->mapa}}">
                </div>

                <input type="submit" class="btn btn-primary" value="Guardar" >
                <a href="/admin/info/contactos" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection