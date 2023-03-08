<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 text-justify">
        {{ __('¿Olvidaste tu password? No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de su password que le permitirá elegir una nueva.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <x-link :href="route('login')">Iniciar Sesión</x-link>
            
            <x-link :href="route('register')">Crear Cuenta</x-link>

        </div>

        <x-primary-button class="justify-center w-full mt-5">
            {{ __('Enviar Instrucciones') }}
        </x-primary-button>
    </form>
</x-guest-layout>
