<x-guest-layout>
    <x-jet-authentication-card>

        <x-slot name="logo">

            <p class="text-center" style="font-size: 13px;">User Login Page</p>

        </x-slot>

        <x-jet-validation-errors class="mb-4" />


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('site.uye_check') }}">
            @csrf


            <div>
                <x-jet-label for="email" value="{{ __('E Posta') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Şifre') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-between mt-4">
            
                    <a class="btn btn-dark text-sm text-gray-600 hover:text-gray-900" href="{{ route('site.uye_register') }}">
                        {{ __('Kayıt Ol') }}
                    </a>
               

                <x-jet-button class="ml-4">
                    {{ __('Giriş Yap') }}
                </x-jet-button>
            </div>

        </form>
        @include('sweetalert::alert')
    </x-jet-authentication-card>
</x-guest-layout>
