@extends('layouts.admin-edits')

@section('content')

@section('title', 'Atualizar: '. $user->name)

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{$user->name}}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <!-- /.content-header -->

        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <form action="/admin/users/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              </form>
            </div>
          </div>
        </div>

@endsection