<x-app-layout>
    @if (Auth::user()->role == "admin")
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    @endif

    @if (Auth::user()->role == "user")
    <x-slot name="header">
        <a href="{{route('loginUser#home')}}">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fa-solid fa-angles-left"></i> {{ __('Back') }}
            </h2>
        </a>
    </x-slot>
    @endif

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

           @if (Auth::user()->role == 'admin')
           @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
           <div class="mt-10 sm:mt-0">
               @livewire('profile.two-factor-authentication-form')
           </div>

           <x-section-border />
       @endif
           @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
