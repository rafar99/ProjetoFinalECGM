<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="/img/logoVerticalDark.png">
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Antes de aceder a esta página deve verificar o seu endereço de email. Para isso basta clicar no link que está no email que acabamos de enviar. Se não recebeu nenhum email, clique no botão para reenviar o email de verificação.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Um novo link de verificação acabou de ser enviado para o seu email.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Reenviar Email de Verificação') }}
                    </x-jet-button>
                </div>
            </form>

            <div>
                @if(auth()->user()->tipoUser_id==2)
                <a
                    href="{{ route('areacliente',['id'=>auth()->user()->id]) }}"
                    class="btn btn-success text-sm text-gray-600 hover:text-gray-900"
                >
                    {{ __('Perfil') }}</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="btn btn-danger text-sm text-gray-600 hover:text-gray-900 ml-2">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
