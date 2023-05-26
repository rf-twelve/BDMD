{{-- <div
    class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
    --}}
    <div
        class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-end sm:justify-end">
        <div x-data="{ show: false, message: '' }"
            x-on:alert.window="show = true; message = $event.detail; setTimeout(() => { show = false }, 2500)"
            x-show="show" x-description="Notification panel, show/hide based on alert state."
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="w-full max-w-sm bg-white rounded-lg shadow-lg pointer-events-auto"
            style="display: none;">
            <div class="overflow-hidden bg-red-200 rounded-lg shadow-xs">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <x-icon.circle-times class="w-6 h-6 text-red-500" />
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p x-text="message" class="text-sm font-medium leading-5 text-gray-900"></p>
                        </div>
                        <div class="flex flex-shrink-0 ml-4">
                            <button @click="show = false"
                                class="inline-flex text-gray-400 transition duration-150 ease-in-out focus:outline-none focus:text-gray-500">
                                <x-icon.times class="w-5 h-5" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
