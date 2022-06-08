@extends('layouts.login-layout')

@section('content')

<section class="vh-100 d-flex bg-light">
    <div class="container h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="card">
                <div class="row g-0">
                    <div class="col">
                        <div class="card-body text-center">
                            <img src="/img/logoVerticalDark.png" class="img-fluid" alt="Logótipo SolarEnergy">
                        </div>

                        <div class="card-body">
                            <h5 class="text-center mb-4">Iniciar sessão</h5>
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-outline mb-4">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email"  class="form-control form-control-md" type="email" name="email"
                                        :value="old('email')" required autofocus />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="form-control form-control-md" type="password" name="password"
                                        required autocomplete="current-password" />
                                </div>

                                <div class="block mt-4">
                                    <label for="remember_me" class="flex items-center">
                                        <x-jet-checkbox id="remember_me" name="remember" />
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <div class="flex items-center justify-end mt-4">

                                    <x-jet-button class="btn btn-md btn-greencolor text-light"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem; width: 100%">
                                        {{ __('Login') }}
                                    </x-jet-button>
                                </div>
                                <p class="small mt-2 pt-1 mb-0 text-center">Não tem uma conta? 
                                    <a href="/register" class="link-success">Registar-se</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
