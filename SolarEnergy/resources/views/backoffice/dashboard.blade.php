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
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>Total de Assistências</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53</h3>
                  <p>Assistências finalizadas</p>
                </div>
                <div class="icon">
                  <i class="bi bi-bookmark-check"></i>
                </div>
                <a href="#" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>
                  <p>Assistências atuais</p>
                </div>
                <div class="icon">
                  <i class="bi bi-bookmark"></i>
                </div>
                <a href="#" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-down"></i></a>
              </div>
            </div>
            <!-- ./col -->


            {{-- <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>
  
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div> --}}


            <!-- ./col -->
          </div>
          <!-- /.row -->
          
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->

            <section class="col-lg-12 connectedSortable">
              <!-- Tabelas aqui-->
            </section>

          </div>
      </section>
      <!-- /.content -->
@endsection