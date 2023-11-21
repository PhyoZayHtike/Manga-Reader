<title>Login</title>
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <a class="display-start text-md text-gray-600 hover:text-gray-900 rounded-md focus:outline-none  focus:ring-indigo-500" href="{{ route('user#home') }}">
                <i class="fa-solid fa-arrow-left mr-1"></i> Back to Home
              </a>
            <div class="text-center text-2xl font-bold mt-4 mb-4">
                Login Form
            </div>
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autofocus autocomplete="username" placeholder="Enter Your Email" />
                @error('email')
                <small class="text-red-500">{{$message}}</small>
              @enderror
              @error('terms')
                <small class="text-red-500">{{$message}}</small>
              @enderror
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password"  autocomplete="current-password" placeholder="Enter Your Password" />
                @error('password')
                <small class="text-red-500">{{$message}}</small>
              @enderror
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>


            <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                      Register Here !
                    </a>


                <x-button class="ml-4">
                    Log in
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
