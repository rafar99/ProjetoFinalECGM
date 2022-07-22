<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="/img/logoVerticalDark.png">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esqueceu a palavra-passe? Não há problema. Escreva o seu email no campo indicado. Será enviado um email para a sua caixa de correio.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button style="background:#31C16C;">
                    {{ __('Link para definir a palavra-passe') }}
                </x-jet-button>
            </div>
            <div class="flex items-center justify-center mt-4">
                <a class="text-sm hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Voltar') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
