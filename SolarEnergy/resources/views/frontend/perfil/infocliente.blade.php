<!doctype html>
@if(auth()->user()->tipoUser_id!=2)
  @php
    header("Location: " . URL::to('/dashboard'), true, 302);
    exit();
  @endphp
@endif
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SolarEnergy</title>
    <link rel="icon" href="/img/logoIcon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>
  <body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col">
                <div class="perfil">
                    <h5>Dados Cliente</h5>
                </div>
                <div class="infoCliente mt-5">
                    <form action="/areacliente/{{$userId}}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-12">
                          <label for="title" class="form-label">Nome</label>
                          <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="col-md-6">
                            <label for="title" class="form-label">Contacto</label>
                            <input type="text" class="form-control" id="contacto"name="contacto">
                        </div>
                        <div class="col-md-6">
                            <label for="title" class="form-label">NIF</label>
                            <input type="text" class="form-control" id="nif" name="nif">
                        </div>
                        <div class="form-group">
                            <label for="title">Tipo de Cliente</label>
                              <select class="form-control" id="tipoCliente" name="tipoCliente">
                                @foreach ($tipoCliente as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                                @endforeach
                            </select>  
                            
                          </div>
                        <div class="col-12">
                          <label for="title" class="form-label">Morada</label>
                          <input type="text" class="form-control" id="morada" name ="morada" placeholder="Rua das Cambalhotas nº 222 Meadela Viana do Castelo">
                        </div>
                        <div class="col-12">
                          <button type="submit" class="btn btn-success mt-4">Guardar</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>