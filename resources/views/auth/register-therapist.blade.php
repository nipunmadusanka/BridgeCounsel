<x-guest-layout>
    <form method="POST" action="{{ route('register-therapist') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="mobile" :value="__('Mobile')" />
            <x-text-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')"
                required autocomplete="mobile" />
            <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="reg_no" :value="__('Reg. Number')" />
            <x-text-input id="reg_no" class="block mt-1 w-full" type="text" name="reg_no" :value="old('reg_no')"
                required autofocus autocomplete="reg_no" />
            <x-input-error :messages="$errors->get('reg_no')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="special" :value="__('Specialisation For')" />
            <select id="special" name="special"
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="1">Inattention Symptoms</option>
                <option value="2">Hyperactivity and Impulsivity Symptoms</option>
                <option value="3">Co-occurring Conditions</option>
                <option value="4">Functional Impairment</option>
            </select>
            <x-input-error :messages="$errors->get('special')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
