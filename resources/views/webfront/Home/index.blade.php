@extends('webfront.layout.app')

@section('webcontent')
    <!-- component -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-0  mt-8">
        <!-- component -->
        <div class="bg-white dark:bg-gray-900 h-screen overflow-hidden">
            <div class="container px-6 py-10 mx-auto">
                <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">From the blog</h1>

                <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                    <div class="lg:flex">
                        <img class="object-cover w-full h-56 rounded-lg lg:w-44"
                            src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                            alt="">

                        <div class="flex flex-col justify-start gap-4 lg:mx-6">
                            <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                How to use sticky note for problem solving
                            </a>

                            <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>
                        </div>
                    </div>

                    <div class="lg:flex">
                        <img class="object-cover w-full h-56 rounded-lg lg:w-44"
                            src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                            alt="">

                        <div class="flex flex-col justify-start gap-4 lg:mx-6">
                            <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                How to use sticky note for problem solving
                            </a>

                            <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>
                        </div>
                    </div>

                    <div class="lg:flex">
                        <img class="object-cover w-full h-56 rounded-lg lg:w-44"
                            src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                            alt="">

                        <div class="flex flex-col justify-start gap-4 lg:mx-6">
                            <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                How to use sticky note for problem solving
                            </a>

                            <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>
                        </div>
                    </div>

                    <div class="lg:flex">
                        <img class="object-cover w-full h-56 rounded-lg lg:w-44"
                            src="https://images.unsplash.com/photo-1530099486328-e021101a494a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1547&q=80"
                            alt="">

                        <div class="flex flex-col justify-start gap-4 lg:mx-6">
                            <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                How to use sticky note for problem solving
                            </a>

                            <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>
                        </div>
                    </div>



                </div>
            </div>
        </div>


        <div class="h-screen flex justify-center items-center ">
            <card class="grid grid-cols-1 max-w-5xl mx-8 rounded-xl bg-blue-800 ">
                <div class="">
                    <div class="py-16 ">
                        <div class="container m-auto px-6 text-white md:px-12 xl:px-6">
                            <div class="flex justify-center items-center flex-col gap-4 mx-4">
                                <div class=" text-center flex justify-center flex-col">
                                    <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">Nuxt development is carried out
                                        by
                                        passionate developers</h2>
                                    <p class="mt-6 text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                        Eum omnis
                                        voluptatem accusantium nemo perspiciatis delectus atque autem! Voluptatum tenetur
                                        beatae unde
                                        aperiam, repellat expedita consequatur! Officiis id consequatur atque doloremque!
                                    </p>
                                    <p class="mt-4 text-white"> Nobis minus voluptatibus pariatur dignissimos libero
                                        quaerat iure
                                        expedita at? Asperiores nemo possimus nesciunt dicta veniam aspernatur quam
                                        mollitia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </card>
        </div>

    </div>
@endsection
