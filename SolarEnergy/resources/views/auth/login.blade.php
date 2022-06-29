<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="/img/logoVerticalDark.png">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mt-5">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Palavra-Passe') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Relembrar palavra-passe') }}</span>
                </label>
            </div>

            <div class="flex items-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a palavra-passe?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-center mt-5">
                <x-jet-button  style="background:#31C16C; padding-left:72px; width:200px;">
                    {{ __('Entrar') }}
                </x-jet-button>
            </div>
            <div class="flex items-center justify-center mt-4">
                <a class="text-sm hover:text-gray-900 " href="{{ route('register') }}">
                    {{ __('Registar') }}
                </a>
          
                <a class="text-sm hover:text-gray-900 ml-4" href="/">
                    {{ __('Voltar') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
