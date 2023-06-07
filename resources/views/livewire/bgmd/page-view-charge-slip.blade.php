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
                    <a href="{{ route('charge-slip-list',['user_id'=> auth()->user()->id]) }}"
                        class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Charge Slip
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
                                <h3 class="text-lg font-medium leading-6 text-gray-900">NO IMAGE FOUND</h3>
                                <img src="{{ asset('img/users/kalibo_logo.png') }}" alt="LOGO"
                                    class="object-cover object-center w-full p-2 opacity-30">
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
                                                    <dt class="text-xs text-gray-500">tn :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['tn'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">date :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['date'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">to :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['to'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">from :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['from'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">for :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['for'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">prepared by :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['prepared_by'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">noted by :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['noted_by'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">vehicle :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['vehicle_id'] }}</dd>
                                                </div>
                                            </dl>

                                        </div>
                                        @endif
                                </div>

                               <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="px-4 divide-y divide-gray-200 sm:px-6 lg:px-8">
                                    <div class="sm:flex sm:items-center">
                                    <div class="sm:flex-auto">
                                        <h1 class="text-xl font-semibold text-gray-900">
                                            Charge Slip Items
                                        </h1>
                                    </div>
                                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                        <x-button wire:click="addItem()" class="flex px-2 text-white bg-blue-500 rounded-xl hover:bg-blue-700">
                                            <x-icon.plus class="w-4 h-4" />
                                            Add
                                        </x-button>
                                    </div>
                                    </div>
                                    <div class="flex flex-col mt-8 -mx-4 sm:-mx-6 md:mx-0">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead>
                                        <tr class="text-sm font-bold text-gray-500 uppercase">
                                            <th scope="col" class="py-3.5 text-left">
                                                item no.
                                            </th>
                                            <th scope="col" class="py-3.5 text-center">
                                                qty
                                            </th>
                                            <th scope="col" class="py-3.5 text-left">
                                                unit
                                            </th>
                                            <th scope="col" class="py-3.5 text-left">
                                                paticular
                                            </th>
                                            <th scope="col" class="py-3.5">
                                                unit price
                                            </th>
                                            <th scope="col" class="py-3.5">
                                                total price
                                            </th>
                                            <th scope="col" class="sr-only">
                                                action
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($data->charge_slip_items as $item)
                                            <tr class="text-gray-500 border-b border-gray-200 text-md">
                                                <td class="py-4 text-left">
                                                    {{ $item_no++; }}
                                                </td>
                                                <td class="py-4 text-center">
                                                    {{ $item['qty'] }}
                                                </td>
                                                <td class="py-4 text-left">
                                                    {{ $item['unit'] }}
                                                </td>
                                                <td class="py-4 text-left">
                                                    {{ $item['particular'] }}
                                                </td>
                                                <td class="py-4 text-right">
                                                    {{ number_format($item['unit_price'],'2','.',',') }}
                                                </td>
                                                <td class="py-4 text-right">
                                                    {{ number_format($item['total_price'],'2','.',',') }}
                                                </td>
                                                <td class="text-right">
                                                    <x-button wire:click="removeItem({{ $item['id'] }})" class="px-2 rounded-xl hover:text-white hover:bg-red-500">
                                                        <x-icon.times class="w-4 h-4" />
                                                    </x-button>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse


                                        <!-- More projects... -->
                                        </tbody>
                                        <tfoot>
                                        @if ($grand_total > 0)
                                        <tr class="text-lg font-bold uppercase">
                                            <th scope="row" colspan="5" class="hidden pt-4 pl-6 pr-3 text-right text-gray-900 sm:table-cell md:pl-0">Total</th>
                                            <th scope="row" class="pt-4 pl-4 pr-3 text-left text-gray-900 sm:hidden">Total</th>
                                            <td class="pt-4 pl-3 pr-4 text-right text-gray-900 sm:pr-6 md:pr-0">
                                                P{{ number_format($grand_total,'2','.',',') }}
                                            </td>
                                        </tr>
                                        @endif

                                        </tfoot>
                                    </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </section>

            </main>
        </div>
        {{-- MODAL FORM --}}
        <div>
            <x-modal.dialog wire:model="showFormModal" maxWidth="sm">
                <x-slot name="title">
                    <div class="flex uppercase">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        <span>Charge Slip Items</span>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <div class="mb-4 space-y-3 overflow-y-auto max-h-96">
                        <div class="space-y-1 sm:col-span-2">
                            <label for="qty" class="text-sm uppercase">qty :</label>
                            <x-input wire:model.lazy="qty" id="qty" type="number"/>
                            @error('qty')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="unit" class="text-sm uppercase">unit :</label>
                            <x-input wire:model.lazy="unit" id="unit" type="text"/>
                            @error('unit')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="particular" class="text-sm uppercase">particular :</label>
                            <x-form.text-area wire:model.lazy="particular" id="particular" rows="3"></x-form.text-area>
                            @error('particular')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="unit_price" class="text-sm uppercase">unit price :</label>
                            <x-input wire:model.lazy="unit_price" id="unit_price" type="number"/>
                            @error('unit_price')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="total_price" class="text-sm uppercase">total price :</label>
                            <x-input wire:model.lazy="total_price" id="total_price" type="text"/>
                            @error('total_price')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                    </div>

                </x-slot>

                <x-slot name="footer">
                    <x-button wire:click="closeRecord()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                        {{ __('Cancel') }}
                    </x-button>
                    <x-button wire:click="saveRecord()" type="button" class="hover:bg-blue-500 hover:text-white">
                        {{ __('Save') }}
                    </x-button>
                </x-slot>
            </x-modal.dialog>
        </div>

    </div>
</div>
