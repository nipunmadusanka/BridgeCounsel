<x-guest-layout>
    <form method="POST" action="{{ route('studentInfo') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="mobile" :value="__('Mobile')" />
            <x-text-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required autocomplete="mobile" />
            <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="address" :value="__('address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="Address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="reg_no" :value="__('Reg. NO')" />
            <x-text-input id="reg_no" class="block mt-1 w-full" type="text" name="reg_no" :value="old('reg_no')" required autocomplete="reg_no" />
            <x-input-error :messages="$errors->get('reg_no')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')" required autocomplete="age" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" required autocomplete="gender" />
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="education" :value="__('Education')" />
            <x-text-input id="education" class="block mt-1 w-full" type="text" name="education" :value="old('education')" required autocomplete="education" />
            <x-input-error :messages="$errors->get('education')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="occupation" :value="__('Ocupation')" />
            <x-text-input id="occupation" class="block mt-1 w-full" type="text" name="occupation" :value="old('occupation')" required autocomplete="occupation" />
            <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            {{-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a> --}}

            <x-primary-button class="ms-4">
                {{ __('Next') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
