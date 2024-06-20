<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div class="mt-8 bg-white p-4 shadow rounded-lg">
                        <h2 class="text-gray-500 text-lg font-semibold pb-4">Students</h2>
                        <div class="my-1"></div> <!-- Espacio de separación -->
                        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                        <!-- Línea con gradiente -->
                        <table class="w-full table-auto text-sm">
                            <thead>
                                <tr class="text-sm leading-normal">
                                    <th
                                        class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                        Profile</th>
                                    <th
                                        class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                        Name</th>
                                    <th
                                        class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                        Rol</th>
                                    <th
                                        class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                        Chat
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Auth::user()->user_type == 2)
                                    @foreach ($therapist_student as $student)
                                        <tr class="hover:bg-grey-lighter">

                                            <td class="py-2 px-4 border-b border-grey-light"><img
                                                    src="{{ asset('profilepic.jpg') }}" alt="Foto Perfil"
                                                    class="rounded-full h-10 w-10"></td>
                                            <td class="py-2 px-4 border-b border-grey-light">
                                                {{ $student->first_name }}</td>
                                            <td class="py-2 px-4 border-b border-grey-light">
                                                {{ $student->occupation }}</td>
                                            <td class="py-2 px-4 border-b border-grey-light">
                                                <a href="{{ route('viewmyChat', ['id' => $student->user_id]) }}"
                                                    target="_blank">
                                                    <button
                                                        class=" bg-orange-400 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded">
                                                        Chat
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                <!-- Añade más filas aquí como la anterior para cada autorización pendiente -->
                                {{-- <tr class="hover:bg-grey-lighter">
                                    <td class="py-2 px-4 border-b border-grey-light"><img
                                            src="https://via.placeholder.com/40" alt="Foto Perfil"
                                            class="rounded-full h-10 w-10"></td>
                                    <td class="py-2 px-4 border-b border-grey-light">test user</td>
                                    <td class="py-2 px-4 border-b border-grey-light">Usuario</td>
                                </tr> --}}
                            </tbody>
                        </table>
                        <!-- Botón "Ver más" para la tabla de Autorizaciones Pendientes -->
                        {{-- <div class="text-right mt-4">
                            <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                                More
                            </button>
                        </div> --}}
                    </div>
                    <div class="mt-8 bg-white p-4 shadow rounded-lg overflow-y-auto">

                        <div class=" bg-slate-500 py-4 px-4 shadow-xl rounded-lg my-4 mx-4">
                            <div class="grid grid-cols-6 justify-between px-4 items-center">
                                <div class="text-lg font-semibold col-span-5">
                                    <p>How to use sticky note for problem solving</p>
                                    <p class="text-white text-base">On: 20 October 2019</p>
                                </div>
                                <div class="text-lg font-semibold">
                                    <div
                                        class="btn border p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 focus:outline-none bg-pink-700 hover:bg-pink-800">
                                        Read More</div>
                                </div>
                            </div>
                        </div>
                        <div class=" bg-slate-500 py-4 px-4 shadow-xl rounded-lg my-4 mx-4">
                            <div class="grid grid-cols-6 justify-between px-4 items-center">
                                <div class="text-lg font-semibold col-span-5">
                                    <p>How to use sticky note for problem solving</p>
                                    <p class="text-white text-base">On: 20 October 2019</p>
                                </div>
                                <div class="text-lg font-semibold">
                                    <div
                                        class="btn border p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 focus:outline-none bg-pink-700 hover:bg-pink-800">
                                        Read More</div>
                                </div>
                            </div>
                        </div>
                        <div class=" bg-slate-500 py-4 px-4 shadow-xl rounded-lg my-4 mx-4">
                            <div class="grid grid-cols-6 justify-between px-4 items-center">
                                <div class="text-lg font-semibold col-span-5">
                                    <p>How to use sticky note for problem solving</p>
                                    <p class="text-white text-base">On: 20 October 2019</p>
                                </div>
                                <div class="text-lg font-semibold">
                                    <div
                                        class="btn border p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 focus:outline-none bg-pink-700 hover:bg-pink-800">
                                        Read More</div>
                                </div>
                            </div>
                        </div>
                        <div class=" bg-slate-500 py-4 px-4 shadow-xl rounded-lg my-4 mx-4">
                            <div class="grid grid-cols-6 justify-between px-4 items-center">
                                <div class="text-lg font-semibold col-span-5">
                                    <p>How to use sticky note for problem solving</p>
                                    <p class="text-white text-base">On: 20 October 2019</p>
                                </div>
                                <div class="text-lg font-semibold">
                                    <div
                                        class="btn border p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 focus:outline-none bg-pink-700 hover:bg-pink-800">
                                        Read More</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
