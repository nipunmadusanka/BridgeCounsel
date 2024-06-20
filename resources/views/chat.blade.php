@extends('webfront.layout.app')
@section('webcontent')
    <!-- component -->
    <div class=" md:p-40 p-20 min-h-screen  ">
        <div class="flex h-screen antialiased text-gray-800">
            <div class="flex flex-row h-full w-full overflow-x-hidden">
                <div class="flex flex-col py-8 p-6 w-64 bg-white flex-shrink-0 rounded-lg">
                    <div class="flex flex-row items-center justify-center h-12 w-full">
                        <div class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-10 w-10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                </path>
                            </svg>
                        </div>
                        <div class="ml-2 font-bold text-2xl">MyChat</div>
                    </div>
                    <div class="ml-2 font-bold text-xl text-center py-3">
                        @if (Auth::user()->user_type == 2)
                            Hey, I'm Student
                        @endif
                        @if (Auth::user()->user_type == 1)
                            Hey, I'm Therapist
                        @endif
                    </div>
                    <div
                        class="flex flex-col items-center bg-indigo-100 border border-gray-200 mt-4 w-full py-6 px-4 rounded-lg">
                        <div class="h-20 w-20 rounded-full border overflow-hidden">
                            <img src="{{ asset('profilepic.jpg') }}" alt="Avatar" class="h-full w-full" />
                        </div>
                        <div class="text-xs text-gray-500 mt-3">{{ $userdetails->email }}</div>
                        <div class="flex flex-row items-center mt-3">
                            <div class="flex flex-col justify-center h-4 w-8 bg-amber-500 rounded-full">
                                <div class="h-3 w-3 bg-white rounded-full self-end mr-1"></div>
                            </div>
                            <div class="leading-none ml-1 text-xs">Active</div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col flex-auto h-full px-6">
                    <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4">
                        <div class="flex flex-col h-full overflow-x-auto mb-4">
                            <div class="flex flex-col h-full">
                                <div class="grid grid-cols-12 gap-y-2">
                                    @foreach ($getchat as $getchat)
                                        {{-- {{$getchat->message}} --}}
                                        @if ($getchat->senderid == Auth::user()->id)
                                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                                <div class="flex items-center justify-start flex-row-reverse">
                                                    <div
                                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-amber-500 flex-shrink-0">
                                                        A
                                                    </div>
                                                    <div
                                                        class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                                        <span
                                                            class=" text-xs font-thin italic border-b text-gray-400">{{ $getchat->created_at }}</span>
                                                        <div class="">{{ $getchat->message }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                                <div class="flex flex-row items-center">
                                                    <div
                                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-amber-500 flex-shrink-0">
                                                        A
                                                    </div>
                                                    <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                                        <span
                                                            class=" text-xs font-thin italic border-b text-gray-400">{{ $getchat->created_at }}</span>
                                                        <div>{{ $getchat->message }}</div>

                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">
                            <div>
                                <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                        </path>
                                    </svg>
                                </button>
                            </div>

                            <div class="flex-grow ml-4">
                                <div class="relative w-full">
                                    <input type="text" name="mychat" id="mychat"
                                        class="mychat flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" />
                                    <input type="hidden" hidden id="senderid" name="senderid"
                                        value="{{ $senderid }}" />
                                    <button
                                        class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="ml-4">
                                <button
                                    class="chatbtn flex items-center justify-center bg-amber-500 hover:bg-amber-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                                    <span>Send</span>
                                    <span class="ml-2">
                                        <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
    $(document).ready(function() {
        $('#mychat').keypress(function(event) {
            if (event.which === 13) { // Check if Enter key is pressed
                event.preventDefault(); // Prevent the default action of Enter key (submitting form)
                $('.chatbtn').click(); // Trigger click event on the chat button
            }
        });
        $('.chatbtn').click(function(e) {
            e.preventDefault();
            var mychat = $('#mychat').val();
            var senderid = $('#senderid').val();
            console.log(mychat);
            if (mychat) {
                $.ajax({
                    url: '{{ Route('postchat') }}',
                    type: 'POST',
                    data: JSON.stringify({
                        mychat: mychat,
                        senderid: senderid,
                    }),
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log(error.responseText);
                    },
                    complete: function() {
                        console.log('Your Rating was successfully submitted')
                    }
                });

            } else {
                console.log('Cannot submit within 1 minutes. Please wait.');
            }
        });
    });
</script>


{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

<script>
    $(document).ready(function() {
    $('#mychat').keypress(function(event) {
        if (event.which === 13) { // Check if Enter key is pressed
            event.preventDefault(); // Prevent the default action of Enter key (submitting form)
            $('.chatbtn').click(); // Trigger click event on the chat button
        }
    });

    $('.chatbtn').click(function(e) {
        e.preventDefault();
        var mychat = $('#mychat').val();
        var senderid = $('#senderid').val();
        console.log(mychat);

        if (mychat) {
            // Encrypt the message using CryptoJS
            var encryptionKey = CryptoJS.enc.Utf8.parse('nipun1234567890');
            var iv = CryptoJS.enc.Base64.parse('AAAAAAAAAAAAAAAAAAAAAA=='); // 16 bytes IV
            var encryptedChat = CryptoJS.AES.encrypt(CryptoJS.enc.Utf8.parse(mychat), encryptionKey, {
                iv: iv,
                mode: CryptoJS.mode.CBC,
                padding: CryptoJS.pad.Pkcs7
            }).toString();

            $.ajax({
                url: '{{ route('postchat') }}',
                type: 'POST',
                data: JSON.stringify({
                    mychat: encryptedChat,
                    senderid: senderid,
                }),
                processData: false,
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error.responseText);
                },
                complete: function() {
                    console.log('Your message was successfully submitted');
                }
            });
        } else {
            console.log('Cannot submit an empty message.');
        }
    });
});

</script> --}}
