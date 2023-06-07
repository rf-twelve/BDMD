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
                    <a href="{{ route('work-order-slip-list',['user_id'=> auth()->user()->id]) }}"
                        class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Maintenance Request Slip
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
                                                    <dt class="text-xs text-gray-500">class :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['class'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">class_id :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['class_id'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">for :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['for'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">priority_type :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['priority_type'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">last_repair_date :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['last_repair_date'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">last_repair_nature :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['last_repair_nature'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">defects :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['defects'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">requested_by :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['requested_by'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">requested_date :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['requested_date'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">received_by :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['received_by'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">received_date :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['received_date'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">inspected_by :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['inspected_by'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">inspected_date :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['inspected_date'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">comments :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['comments'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">parts_needed :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['parts_needed'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">approved_by :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['approved_by'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">approved_date :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['approved_date'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">work_completed_on :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['work_completed_on'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">status :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['status'] }}</dd>
                                                </div>
                                                <div class="px-4 py-2 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-xs text-gray-500">encoder_id :</dt>
                                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{ $data['encoder_id'] }}</dd>
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
                                            Work Orders
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
                                            <th scope="col" class="py-3.5 px-1 text-left">
                                                #
                                            </th>
                                            <th scope="col" class="py-3.5 px-1 text-left">
                                                assigned worker
                                            </th>
                                            <th scope="col" class="py-3.5 px-1 text-left">
                                                work order no
                                            </th>
                                            <th scope="col" class="py-3.5 px-1 text-left">
                                                status
                                            </th>
                                            <th scope="col" class="py-3.5 px-1 text-left">
                                                encoder id
                                            </th>
                                            <th scope="col" class="py-3.5 px-1 text-left">
                                            </th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($data->work_orders as $item)
                                            <tr class="text-gray-500 border-b border-gray-200 text-md">
                                                <td class="py-4 text-left">
                                                    {{ $item_no++; }}
                                                </td>
                                                <td class="py-4 text-center">
                                                    {{ $item['assigned_worker'] }}
                                                </td>
                                                <td class="py-4 text-center">
                                                    {{ $item['work_order_no'] }}
                                                </td>
                                                <td class="py-4 text-center">
                                                    {{ $item['status'] }}
                                                </td>
                                                <td class="py-4 text-center">
                                                    {{ $item['encoder_id'] }}
                                                </td>
                                                <td class="flex-1 text-right">
                                                    <x-button wire:click="toggleView({{ $item['id'] }})" class="px-2 rounded-xl hover:text-white hover:bg-blue-500">
                                                        <x-icon.view class="w-4 h-4" />
                                                    </x-button>
                                                    <x-button wire:click="toggleDeleteSingleRecordModal({{ $item['id'] }})" class="px-2 rounded-xl hover:text-white hover:bg-red-500">
                                                        <x-icon.times class="w-4 h-4" />
                                                    </x-button>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse


                                        <!-- More projects... -->
                                        </tbody>

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
                            <label for="description" class="text-sm uppercase">description :</label>
                            <x-form.text-area wire:model.lazy="description" id="description" rows="3"></x-form.text-area>
                            @error('description')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="estimated_man_hours" class="text-sm uppercase">estimated man hours :</label>
                            <x-input wire:model.lazy="estimated_man_hours" id="estimated_man_hours" type="text"/>
                            @error('estimated_man_hours')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="remarks" class="text-sm uppercase">remarks :</label>
                            <x-form.text-area wire:model.lazy="remarks" id="remarks" rows="3"></x-form.text-area>
                            @error('remarks')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="status" class="text-sm uppercase">status :</label>
                            <x-input wire:model.lazy="status" id="status" type="text"/>
                            @error('status')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
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

        <!-- Delete Single Record Modal -->
        <div>
            <form wire:submit.prevent="deleteSelectedRecord">
                <x-modal.confirmation wire:model.defer="showDeleteSingleRecordModal" selectedIcon="delete">
                    <x-slot name="title">Delete Selected Record</x-slot>

                    <x-slot name="content">
                        <div class="py-8 text-gray-700">Are you sure you? This action is irreversible.</div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-button type="button" wire:click.prevent="$set('showDeleteSingleRecordModal', false)">Cancel</x-button>

                        <x-button type="submit">Delete</x-button>
                    </x-slot>
                </x-modal.confirmation>
            </form>
        </div>


    </div>
</div>
