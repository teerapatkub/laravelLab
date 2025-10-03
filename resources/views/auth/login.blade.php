<x-guest-layout>
    <x-authentication-card>
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-label for="email" value="{{ __('อีเมล') }}"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('รหัสผ่าน') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-white hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                    href="{{ route('password.request') }}">
                    {{ __('ลืมรหัสผ่าน') }}
                </a>
                @endif
            </div>

            <div class="mt-5 text-center">
                <x-button>
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        <div>
            <h5 class="mt-4 mb-4 text-center text-white">หากคุณยังไม่เป็นสมาชิก</h5>
                <a href="{{ route('register') }}">
                    <x-button>
                        {{__('สมัครสมาชิก') }}
                    </x-button>
                </a>
        </div>
    </x-authentication-card>
</x-guest-layout>
