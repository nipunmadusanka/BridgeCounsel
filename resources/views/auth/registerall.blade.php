<x-guest-layout>
    <div class="realtive w-full h-32">
        <div class="grid grid-cols-2 gap-4 h-full">
            <div class="flex justify-center items-center">
                <a href={{ Route('register-student') }}
                    class="bg-gray-100 hover:bg-indigo-600 hover:cursor-pointer rounded-sm text-gray-900 hover:text-gray-50 font-bold text-3xl font-serif w-full py-10">
                    <div class="flex justify-center items-center">
                        <p>Student</p>
                    </div>
                </a>
            </div>
            <div class="flex justify-center items-center">
                <a href={{ Route('register-therapist') }}
                    class=" bg-gray-100 hover:bg-indigo-600 hover:cursor-pointer rounded-sm text-gray-900 hover:text-gray-50 font-bold text-3xl font-serif w-full py-10">
                    <div class="flex justify-center items-center">
                        <p>Therapist</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
