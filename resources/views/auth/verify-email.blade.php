<x-guest-layout>
    {{-- formulario de enviar correo de verificacion --}}
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Es necesario confirmar tu cuenta antes de continuar, revisa tu email y presiona sobre el enlace de confirmacion') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Hemos enviado un nuevo email de confirmacion a la cuenta que colocaste en el registro.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Enviar email de confirmación') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Cerrar sesión') }}
            </button>
        </form>
    </div>
</x-guest-layout>
