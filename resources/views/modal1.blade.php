<!-- resources/views/components/modal.blade.php -->
<div x-data="{ open: false }" @keydown.escape.window="open = false">
    <!-- Trigger Button -->
    <button @click="open = true" class="bg-blue-500 text-white px-4 py-2 rounded">
        {{ $triggerText }}
    </button>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50" x-cloak>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full" @click.away="open = false">
            <!-- Modal Header -->
            <div class="bg-gray-200 px-4 py-2 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
                <button @click="open = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="px-4 py-6">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
