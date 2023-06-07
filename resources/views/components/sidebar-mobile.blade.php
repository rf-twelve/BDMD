<div x-show="openSidebarMobile" class="fixed inset-0 z-40 flex lg:hidden" role="dialog" aria-modal="true" hidden>

    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>

    <div class="relative flex flex-col flex-1 w-full max-w-xs pb-4 text-white bg-indigo-200">

        <div class="absolute top-0 right-0 pt-2 -mr-12">
            <button type="button" x-on:click="openSidebarMobile = false"
                class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                <span class="sr-only">Close sidebar</span>
                <!-- Heroicon name: outline/x -->
              <x-icon.times class="w-6 h-6 text-white" />
            </button>
        </div>

        <div class="flex justify-center flex-shrink-0 px-4 py-2">
            <img class="w-auto h-8 mr-2"
                src="{{ $company ? $company->logoUrl() : '' }}" alt="Logo">
                <span class="text-3xl font-bold text-indigo-700 uppercase">{{ $company ? $company->name : '' }}</span>
        </div>

        <x-sidebar-content />

    </div>

    <div class="flex-shrink-0 w-14" aria-hidden="true">
        <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
</div>
