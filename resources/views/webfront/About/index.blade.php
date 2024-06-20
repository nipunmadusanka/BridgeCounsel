@extends('webfront.layout.app')

@section('webcontent')
    <div class="grid grid-cols-2 gap-4 my-14 px-8">
        <!-- component -->
        <!-- Tailwind Play: https://play.tailwindcss.com/qIqvl7e7Ww  -->
        <div class="flex min-h-screen items-center justify-start bg-white">
            <div class="mx-auto w-full max-w-lg">
                <h1 class="text-4xl font-medium">Contact us</h1>
                <p class="mt-3">Email us at help@bridgeconsel.com or message us here:</p>

                <form action="https://api.web3forms.com/submit" class="mt-10">

                    <!-- This is a working contact form.
                   Get your free access key from: https://web3forms.com/  -->

                    <input type="hidden" name="access_key" value="YOUR_ACCESS_KEY_HERE" />
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div class="relative z-0">
                            <input type="text" name="name"
                                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                                placeholder=" " />
                            <label
                                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your
                                name</label>
                        </div>
                        <div class="relative z-0">
                            <input type="text" name="email"
                                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                                placeholder=" " />
                            <label
                                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your
                                email</label>
                        </div>
                        <div class="relative z-0 col-span-2">
                            <textarea name="message" rows="5"
                                class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                                placeholder=" "></textarea>
                            <label
                                class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your
                                message</label>
                        </div>
                    </div>
                    <button type="submit" class="mt-5 rounded-md bg-black px-10 py-2 text-white">Send Message</button>
                </form>
            </div>
        </div>
        <!-- component -->
        <div class="py-16 bg-white">
            <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
                <div class="flex justify-center items-center flex-col gap-4 mx-4">
                    <div class="md:5/12 lg:w-5/12">
                        <img src="https://tailus.io/sources/blocks/left-image/preview/images/startup.png" alt="image"
                            loading="lazy" width="" height="">
                    </div>
                    <div class=" text-center flex justify-center flex-col">
                        <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">Nuxt development is carried out by
                            passionate developers</h2>
                        <p class="mt-6 text-gray-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum omnis
                            voluptatem accusantium nemo perspiciatis delectus atque autem! Voluptatum tenetur beatae unde
                            aperiam, repellat expedita consequatur! Officiis id consequatur atque doloremque!</p>
                        <p class="mt-4 text-gray-600"> Nobis minus voluptatibus pariatur dignissimos libero quaerat iure
                            expedita at? Asperiores nemo possimus nesciunt dicta veniam aspernatur quam mollitia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
