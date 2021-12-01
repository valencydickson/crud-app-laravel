<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h3>Register</h3>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->

            <x-label for="name" :value="__('Name')" class="mt-4" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus />


            <!-- Email Address -->

            <x-label for="email" :value="__('Email')" class="mt-4" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />


            <!-- Username -->

            <x-label for="name" :value="__('Username')" class="mt-4" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required
                autofocus />


            <!-- Password -->

            <x-label for="password" :value="__('Password')" class="mt-4" />

            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />


            <!-- Confirm Password -->

            <x-label for="password_confirmation" :value="__('Confirm Password')" class="mt-4" />

            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required />


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>