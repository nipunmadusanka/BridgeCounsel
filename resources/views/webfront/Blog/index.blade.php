@extends('webfront.layout.app')

@section('webcontent')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach ($blog as $blog)
                    <div class="p-4 md:w-1/3">
                        <div
                            class="h-full rounded-xl shadow-cla-violate bg-gradient-to-r from-pink-50 to-red-50 overflow-hidden">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100"
                                src="{{ asset('images/' . $blog->image) }}"
                                alt="blog">
                            <div class="p-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY-1</h2>
                                <h1 class="title-font text-lg font-medium text-gray-600 mb-3">{{ $blog->title }}</h1>
                                <p class="leading-relaxed mb-3">{{ implode(' ', array_slice(str_word_count(strip_tags($blog->content), 1), 0, 15)) }}</p>
                                <div class="flex items-center flex-wrap ">
                                    <a href="{{ route('view-blog', ['id' => $blog->id]) }}">
                                    <button
                                        class="bg-gradient-to-r from-orange-300 to-amber-400 hover:scale-105 drop-shadow-md shadow-cla-violate px-4 py-1 rounded-lg">Read
                                        more</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
