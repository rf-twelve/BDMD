<div class="min-h-full">
    <div class="flex flex-col min-h-0">
        <!-- Top nav-->
        <x-topbar-desktop>
            <li class="flex">
                <div class="flex items-center">
                    <x-icon.greater-than class="flex-shrink-0 w-6 h-full text-gray-200" />
                    <a href="{{ route('dashboard',['user_id'=> auth()->user()->id]) }}"
                        class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Dashboard
                    </a>
                </div>
            </li>
            <li class="flex">
                <div class="flex items-center">
                    <x-icon.greater-than class="flex-shrink-0 w-6 h-full text-gray-200" />
                    <a href="{{ route('equipment-list',['user_id'=> auth()->user()->id]) }}"
                        class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Equipment
                    </a>
                </div>
            </li>
            <li class="flex">
                <div class="flex items-center">
                    <x-icon.greater-than class="flex-shrink-0 w-6 h-full text-gray-200" />
                    <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        View
                    </a>
                </div>
            </li>
        </x-topbar-desktop>

        <!-- Bottom section -->
        <div class="flex-1 min-h-0 overflow-hidden">
            <!-- Main area -->
            <main class="flex-1 min-w-0 border-t border-gray-200 xl:flex">

                <div class="order-first xl:block xl:flex-shrink-0">
                    <div class="relative flex flex-col h-full bg-gray-100 border-r border-gray-200 w-96">
                        <div class="p-4 space-y-6 divide-y divide-gray-200 sm:space-y-5">
                            @forelse ($images as $image)
                                <h3 class="text-lg font-medium leading-6 text-gray-900">IMAGES</h3>
                                <img src="{{ $image->imageUrl() }}" alt="image"
                                    class="object-cover object-center w-full p-2">
                            @empty
                                <h3 class="text-lg font-medium leading-6 text-gray-900">LGU KALIBO</h3>
                                <img src="{{ asset('img/kalibo_logo.png') }}" alt="LOGO"
                                    class="object-cover object-center w-full p-2">
                            @endforelse
                        </div>
                    </div>
                </div>


                <section aria-labelledby="message-heading"
                    class="flex flex-col flex-1 h-full min-w-0 overflow-hidden xl:order-last">

                    <!-- RIGTH SIDE SPACE -->
                    <div class="flex-1 overflow-y-auto lg:block">
                        <div class="min-h-screen pb-6 bg-white shadow">
                            <div class="sm:items-baseline sm:justify-between">

                                <div class="p-4 space-y-6 divide-y divide-gray-200 sm:space-y-5">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                                            INFORMATION
                                        </h3>

                                        @if (isset($data))

                                        <div class="font-medium uppercase border-t border-gray-200">
                                            <dl>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">NAME :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['name'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">DESCRIPTION :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['description'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">BRAND :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['brand'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">SERIAL NUMBER :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['serial_no'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">acquisition date :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['acquisition_date'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">acquisition cost :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['acquisition_cost'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">warranty expiration :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['warranty_expiration'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">location :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['located'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">remarks :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['remarks'] }}</dd>
                                                </div>

                                            </dl>

                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>


                </section>

            </main>
        </div>
    </div>
</div>
