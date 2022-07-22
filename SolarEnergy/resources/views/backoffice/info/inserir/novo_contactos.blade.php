@extends('layouts.admin-edits')
@if(auth()->user()->tipoUser_id!=1)
  @php
    header("Location: " . URL::to('/admin/dashboard'), true, 302);
    exit();
  @endphp
@endif
@section('title', 'Inserir: Info Contactos')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-capitalize">Inserir informação: Contactos</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container-fluid">
          <div class="row px-2">
            <div class="col-md-12">
              <form action="/admin/info/contactos" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group">
                  <label for="telefone" class="form-label">Telemóvel/Telefone</label>
                  <input type="text" class="form-control" id="telefone" name="telefone" required>
                </div>
               
                <div class="mb-3 form-group">
                  <label for="morada" class="form-label">Morada</label>
                  <textarea class="form-control" id="morada" rows="3" name="morada" required></textarea>
                </div>

                <div class="mb-3 form-group">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3 form-group">
                  <label for="mapa" class="form-label">Mapa</label>
                  <input type="text" class="form-control" id="mapa" name="mapa">
                </div>
                

                <input type="submit" class="btn btn-primary" value="Guardar" >
                <a href="/admin/info/contactos" class="btn btn-danger float-right">Voltar</a>

              </form>
            </div>
          </div>
        </div>

@endsection