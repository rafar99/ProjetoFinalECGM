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
                            <h5 class="text-center mb-4">Registo</h5>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div>
                                    <x-jet-label for="nome" value="{{ __('Nome') }}" />
                                    <x-jet-input id="nome" class="form-control form-control-md" type="text" name="nome"
                                        :value="old('nome')" required autofocus autocomplete="nome" />
                                </div>

                                <div class="mt-2">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" class="form-control form-control-md" type="email" name="email"
                                        :value="old('email')" required />
                                </div>

                                <div class="mt-2">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="form-control form-control-md" type="password" name="password"
                                        required autocomplete="new-password" />
                                </div>

                                <div class="mt-2">
                                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                    <x-jet-input id="password_confirmation" class="form-control form-control-md" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                </div>
                                
                                 {{-- <div class="mt-2">
                                    <x-jet-label for="tipoUtilizador_id" value="{{ __('tipo') }}" />
                                    <x-jet-input id="tipoUtilizador_id" class="form-control form-control-md" type="number" name="tipoUtilizador_id"
                                        :value="old('tipoUtilizador_id')" required />
                                </div> --}}
                                @if($errors->any())
                                {{ implode('', $errors->all(':message')) }}
                            @endif

                                
                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-2">
                                    <x-jet-label for="terms">
                                        <div class="flex items-center">
                                            <x-jet-checkbox name="terms" id="terms" />

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                                    class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms
                                                    of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                                    class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                                    Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-jet-label>
                                </div>
                                @endif
                                <div class="flex items-center justify-end mt-2">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                        href="{{ route('login') }}">
                                        {{ __('Já tem registo?') }}
                                    </a>
                                </div>
                                <div class="flex items-center justify-end mt-2">
                                    <x-jet-button class="btn btn-md btn-greencolor text-light py-2"
                                    style="padding: 0 2.5rem; width: 100%">
                                        {{ __('Registar') }}
                                    </x-jet-button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
