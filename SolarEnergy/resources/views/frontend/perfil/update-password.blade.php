<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Atualizar Palavra-Passe</title>
    <link rel="icon" href="/img/logoIcon.png" type="image/x-icon">


    {{-- CSS Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    {{-- JavaScript Bundle with Popper Bootstrap--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    {{-- Bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/css/styles.css">
    <link rel="icon" href="/img/logoIcon.png" type="image/x-icon">
    
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="/" class="navbar-brand">
                    <img src="/img/logoDark.png" alt="SolarEnergyLogo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                    aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="navbar-nav text-end">
                        <li class="nav-item">
                            <a href="/" class="nav-link text-dark">
                                Início
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/empresa" class="nav-link text-dark">
                                Empresa
                            </a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="/assistencia" class="nav-link text-dark">
                                Assistência
                            </a>
                        </li>
                        @endauth
                        <li class="nav-item">
                            <a href="/contactos" class="nav-link text-dark">
                                Contactos
                            </a>
                        </li>

                        <li>
                            <div id="navDivider"></div>
                        </li>
                        @auth
                        <li class="nav-item dropdown">
                            @if(auth()->user()->tipoUser_id==2)
                                <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{auth()->user()->name}}
                                </a>
                                
                                <!--Dropdown para aceder ao perfil da página e para sair da sessão-->
                                <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/areacliente/{{$cliente->id}}">A Minha Conta</a></li>
                                
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <a href="/logout" class="dropdown-item text-dark" onclick="event.preventDefault();
                                                this.closest('form').submit();">Sair</a>
                                        </form>

                                    </li>
                                </ul>
                            @else
                                <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{auth()->user()->name}}
                                </a>
                                
                                <!--Dropdown para aceder ao perfil da página e para sair da sessão-->
                                <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/admin">Área Admin</a></li>
                                
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <a href="/logout" class="dropdown-item text-dark" onclick="event.preventDefault();
                                                this.closest('form').submit();">Sair</a>
                                        </form>

                                    </li>
                                </ul>
                            @endif
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link text-dark">
                                <i class="bi bi-person-circle"></i>
                                Login
                            </a>
                        </li>
                        @endguest
                    </ul>
                </div>

        </nav>
        <hr class="divider">
    </header>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Atualizar Palavra-Passe') }}</div>

                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Atual Palavra-Passe</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Nova Palavra-Passe</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirmar Nova Palavra-Passe</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Submeter</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    </body>
<script src="/js/scripts.js"></script>
</html>