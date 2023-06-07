<div class="min-h-screen bg-gray-100 ">

    <div class="flex flex-col">
        <main class="flex-1">

            <!-- Topbar Desktop -->
            <x-topbar-desktop>
                <li class="flex">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <a href="{{ route('dashboard',['user_id'=> auth()->user()->id]) }}" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                            Dashboard
                        </a>
                    </div>
                </li>
                <li class="flex">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                            Charge Slip List
                        </a>
                    </div>
                </li>
            </x-topbar-desktop>
            <div class="sm:flex">
                <div class="flex items-center flex-1 my-2">
                    <div class="w-full lg:max-w-xs">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative w-full pl-2 pr-2">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <x-icon.search class="w-5 h-5 text-gray-500" />
                            </div>
                            <x-input wire:model.debounce.500ms="filters.search" id="searchTerm"
                                class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-xl focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Search" placeholder="Type any keyword..." type="search" />
                        </div>
                    </div>
                    {{-- <a href="{{ route('charge-print-list',['user_id'=>auth()->user()->id]) }}"
                        target="_blank" class="flex ml-3 text-indigo-600 hover:text-indigo-900">
                        <x-icon.printer class="w-5 h-5" /><span class="text-sm">Print List</span>
                    </a> --}}
                </div>
                <div class="flex justify-between px-2 my-2 space-x-2">
                    <div>
                        <x-button wire:click="toggleCreateRecordModal()"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 bg-white border border-transparent border-gray-300 shadow-sm hover:text-white w-max rounded-xl hover:bg-blue-500">
                            <x-icon.plus class="w-5 h-5" /> <span>Create</span>
                        </x-button>
                    </div>
                    <div class="flex justify-end space-x-1">
                        <div>
                            <x-select wire:model="perPage" id="perPage">
                                <option value="10">10 / page</option>
                                <option value="25">25 / page</option>
                                <option value="50">50 / page</option>
                                <option value="100">100 / page</option>
                            </x-select>
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex flex-col">
                <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow">
                    <x-table>
                        <x-slot name="head">
                            <x-table.head class="px-2 py-1"></x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('tn')"
                                :direction="$filters['sort-field'] === 'tn' ? $filters['sort-direction'] : null">
                                TRACKING NUMBER
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('date')"
                                :direction="$filters['sort-field'] === 'date' ? $filters['sort-direction'] : null">
                                DATE
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('to')"
                                :direction="$filters['sort-field'] === 'to' ? $filters['sort-direction'] : null">
                                TO
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('from')"
                                :direction="$filters['sort-field'] === 'from' ? $filters['sort-direction'] : null">
                                FROM
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('for')"
                                :direction="$filters['sort-field'] === 'for' ? $filters['sort-direction'] : null">
                                FOR
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('prepared_by')"
                                :direction="$filters['sort-field'] === 'prepared_by' ? $filters['sort-direction'] : null">
                                PREPARED BY
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('noted_by')"
                                :direction="$filters['sort-field'] === 'noted_by' ? $filters['sort-direction'] : null">
                                NOTED BY
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('vehicle_id')"
                                :direction="$filters['sort-field'] === 'vehicle_id' ? $filters['sort-direction'] : null">
                                VEHICLE
                            </x-table.head>
                        </x-slot>

                        <x-slot name="body">
                            @if($selectPage)
                            <x-table.row class="bg-gray-300" wire:key="row-message">
                                <x-table.cell colspan="9" class="py-2">
                                    @unless ($selectAll)
                                    <div>
                                        <span>You have selected <strong>{{ $records->count() }}</strong> records, do you
                                            want to select all <strong>{{ $records->total() }}</strong>?</span>
                                        <x-button wire:click="selectAll" class="ml-1 text-blue-500">Select All
                                        </x-button>
                                    </div>
                                    @else
                                    <span>You have selected all <strong>{{ $records->total() }}</strong> records.</span>
                                    @endIf
                                </x-table.cell>
                            </x-table.row>
                            @endif
                            @forelse ($records as $item)
                            <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}" class="text-gray-600 hover:bg-blue-100">
                                <x-table.cell class="max-w-2xl">
                                    <div class="flex justify-center space-x-2">

                                        <x-button class="px-2 rounded-xl hover:text-white hover:bg-blue-500" wire:click="toggleView({{ $item->id }})">
                                            <x-icon.view class="w-5 h-5" />
                                        </x-button>

                                        <x-button class="px-2 rounded-xl hover:text-white hover:bg-blue-500" wire:click="toggleEditRecordModal({{ $item->id }})">
                                            <x-icon.edit class="w-5 h-5" />
                                        </x-button>

                                        <x-button class="px-2 rounded-xl hover:text-white hover:bg-red-500" wire:click="toggleDeleteSingleRecordModal({{ $item->id }})">
                                            <x-icon.trash class="w-5 h-5" />
                                        </x-button>
                                    </div>
                                </x-table.cell>
                                {{-- <x-table.cell class="space-y-2 text-center">
                                    <span>
                                        <img src="{{ $item->imageUrl() }}" alt="Images" class="flex-none w-12 h-12 border border-gray-200 rounded-md">
                                    </span>
                                </x-table.cell> --}}
                                <x-table.cell>
                                    <span>{{ $item['tn'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['date'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['to'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['from'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['for'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['prepared_by'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['noted_by'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['vehicle_id'] }}</span>
                                </x-table.cell>
                            </x-table.row>
                            @empty
                            <x-table.row wire:loading.class.delay="opacity-50">
                                <x-table.cell colspan="9">
                                    <div class="flex items-center justify-center">
                                       <x-icon.box-empty class="w-8 h-8 text-slate-400" />
                                        <span class="px-2 py-8 text-xl font-medium text-slate-400">No Records
                                            found...</span>
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                            @endforelse
                            <x-table.row class="bg-gray-300" wire:key="row-message">
                                <x-table.cell colspan="9" class="">
                                    {{ $records->links('vendor.livewire.modified-tailwind') }}
                                </x-table.cell>
                            </x-table.row>
                        </x-slot>
                    </x-table>

                    <!-- Pagination -->

                </div>
            </div>
        </div>

        <!-- Create/Edit Form Modal -->
        <div>
            <x-modal.dialog wire:model="showFormModal" maxWidth="md">
                <x-slot name="title">
                    <div class="flex uppercase">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        <span>{{ $form_type.' FORM' }}</span>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <div class="px-2 mb-4 space-y-3 overflow-y-auto max-h-96">
                        <div class="space-y-1 sm:col-span-2">
                            <label for="tn" class="text-sm">TRACKING NUMBER :</label>
                            <x-input wire:model.lazy="tn" id="tn" type="text"/>
                            @error('tn')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="date" class="text-sm">DATE :</label>
                            <x-input wire:model.lazy="date" id="date" type="date"/>
                            @error('date')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="to" class="text-sm">TO :</label>
                            <x-input wire:model.lazy="to" id="to" type="text"/>
                            @error('to')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="from" class="text-sm">FROM :</label>
                            <x-input wire:model.lazy="from" id="from" type="text"/>
                            @error('from')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="for" class="text-sm">FOR :</label>
                            <x-form.text-area wire:model.lazy="for" id="for" rows="3"></x-form.text-area>
                            @error('for')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="prepared_by" class="text-sm">PREPARED BY :</label>
                            <x-input wire:model.lazy="prepared_by" id="prepared_by" type="text"/>
                            @error('prepared_by')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="noted_by" class="text-sm">NOTED BY :</label>
                            <x-input wire:model.lazy="noted_by" id="noted_by" type="text"/>
                            @error('noted_by')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="vehicle_id" class="text-sm">VEHICLE :</label>
                            <x-select wire:model.lazy="vehicle_id" id="vehicle_id" class="w-full focus:ring-green-500">
                                <option value="">-Please Select-</option>
                                @forelse ($vehicles as $vehicle)
                                <option value="{{$vehicle['id']}}">{{ $vehicle['name'] }}</option>
                                @empty
                                @endforelse
                            </x-select>
                            @error('vehicle_id')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
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
            <form wire:submit.prevent="deleteSingleRecord">
                <x-modal.confirmation wire:model.defer="showDeleteSingleRecordModal" selectedIcon="delete">
                    <x-slot name="title">Delete Record</x-slot>

                    <x-slot name="content">
                        <div class="py-8 text-gray-700">Are you sure you? This action is irreversible.</div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-button type="button" wire:click="$set('showDeleteSingleRecordModal', false)">Cancel</x-button>

                        <x-button type="submit">Delete</x-button>
                    </x-slot>
                </x-modal.confirmation>
            </form>
        </div>

        <!-- Delete Single Record Modal -->
        <div>
            <form wire:submit.prevent="deleteSelectedRecord">
                <x-modal.confirmation wire:model.defer="showDeleteSelectedRecordModal" selectedIcon="delete">
                    <x-slot name="title">Delete Selected Record</x-slot>

                    <x-slot name="content">
                        <div class="py-8 text-gray-700">Are you sure you? This action is irreversible.</div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-button type="button" wire:click.prevent="$set('showDeleteSelectedRecordModal', false)">Cancel</x-button>

                        <x-button type="submit">Delete</x-button>
                    </x-slot>
                </x-modal.confirmation>
            </form>
        </div>


        </main>
    </div>
</div>
