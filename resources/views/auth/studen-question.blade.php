<x-guest-layout>
    <form method="POST" action="{{ route('studentAnswer') }}">
        @csrf

        <!-- Name -->
        {{-- <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div> --}}
        <p class=" text-center font-serif text-xl font-bold mb-5 text-white">Mental Health and Well-being Questionnaire
        </p>
        <div class="flex justify-center items-center flex-col gap-3 ">

            <div class="w-full max-w-xs">
                <label for="one" class="block text-sm font-medium text-white">How often do you feel happy and
                    satisfied with your life?</label>
                <select id="one" name="one"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="1">Never</option>
                    <option value="2">Rarely</option>
                    <option value="3">Sometimes</option>
                    <option value="4">Often</option>
                    <option value="5">Always</option>
                </select>
            </div>
            <div class="w-full max-w-xs">
                <label for="two" class="block text-sm font-medium text-white">How would you rate your overall
                    stress levels?</label>
                <select id="two" name="two"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="1">Very high</option>
                    <option value="2">High</option>
                    <option value="3">Moderate</option>
                    <option value="4">Low</option>
                    <option value="5">Very low</option>
                </select>
            </div>
            <div class="w-full max-w-xs">
                <label for="three" class="block text-sm font-medium text-white">How often do you feel anxious or
                    worried?</label>
                <select id="three" name="three"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="1">Always</option>
                    <option value="2">Often</option>
                    <option value="3">Sometimes</option>
                    <option value="4">Rarely</option>
                    <option value="5">Never</option>
                </select>
            </div>
            <div class="w-full max-w-xs">
                <label for="four" class="block text-sm font-medium text-white">How well do you sleep at
                    night?</label>
                <select id="four" name="four"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="1">Very poorly</option>
                    <option value="2">Poorly</option>
                    <option value="3">Fairly well</option>
                    <option value="4">Well</option>
                    <option value="5">Very well</option>
                </select>
            </div>
            <div class="w-full max-w-xs">
                <label for="five" class="block text-sm font-medium text-white">How often do you feel depressed or
                    down?</label>
                <select id="five" name="five"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="1">Always</option>
                    <option value="2">Often</option>
                    <option value="3">Sometimes</option>
                    <option value="4">Rarely</option>
                    <option value="5">Never</option>
                </select>
            </div>
            <div class="w-full max-w-xs">
                <label for="six" class="block text-sm font-medium text-white">How would you describe your ability
                    to manage daily responsibilities?</label>
                <select id="six" name="six"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="1">Very poorly</option>
                    <option value="2">Poorly</option>
                    <option value="3">Fairly well</option>
                    <option value="4">Well</option>
                    <option value="5">Very well</option>
                </select>
            </div>
            <div class="w-full max-w-xs">
                <label for="seven" class="block text-sm font-medium text-white">How often do you engage in activities
                    or hobbies that you enjoy?</label>
                <select id="seven" name="seven"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="1">Never</option>
                    <option value="2">Rarely</option>
                    <option value="3">Sometimes</option>
                    <option value="4">Often</option>
                    <option value="5">Always</option>
                </select>
            </div>
            <div class="w-full max-w-xs">
                <label for="eight" class="block text-sm font-medium text-white">How would you rate the quality of
                    your relationships with family and friends?</label>
                <select id="eight" name="eight"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="1">Very poor</option>
                    <option value="2">Poor</option>
                    <option value="3">Fair</option>
                    <option value="4">Good</option>
                    <option value="5">Excellent</option>
                </select>
            </div>
            <div class="w-full max-w-xs">
                <label for="nine" class="block text-sm font-medium text-white">How confident are you in your ability
                    to handle life’s challenges?</label>
                <select id="nine" name="nine"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="1">Not at all confident</option>
                    <option value="2">Slightly confident</option>
                    <option value="3">Somewhat confident</option>
                    <option value="4">Confident</option>
                    <option value="5">Very confident</option>
                </select>
            </div>


        </div>
        <div class="flex items-center justify-end mt-4">
            {{-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a> --}}

            <x-primary-button class="ms-4">
                {{ __('Finish') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
