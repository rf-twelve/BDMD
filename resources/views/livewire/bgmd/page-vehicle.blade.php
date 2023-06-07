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
                            Vehicle List
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
                    <a href="{{ route('vehicle-print-list',['user_id'=>auth()->user()->id]) }}"
                        target="_blank" class="flex ml-3 text-indigo-600 hover:text-indigo-900">
                        <x-icon.printer class="w-5 h-5" /><span class="text-sm">Print List</span>
                    </a>
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
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('name')"
                                :direction="$filters['sort-field'] === 'name' ? $filters['sort-direction'] : null">
                                NAME
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('description')"
                                :direction="$filters['sort-field'] === 'description' ? $filters['sort-direction'] : null">
                                DESCRIPTION
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('type')"
                                :direction="$filters['sort-field'] === 'type' ? $filters['sort-direction'] : null">
                                TYPE
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('make')"
                                :direction="$filters['sort-field'] === 'make' ? $filters['sort-direction'] : null">
                                MAKE
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('brand')"
                                :direction="$filters['sort-field'] === 'brand' ? $filters['sort-direction'] : null">
                                BRAND
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('model')"
                                :direction="$filters['sort-field'] === 'model' ? $filters['sort-direction'] : null">
                                MODEL
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('plate_no')"
                                :direction="$filters['sort-field'] === 'plate_no' ? $filters['sort-direction'] : null">
                                PLATE NO.
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('serial_no')"
                                :direction="$filters['sort-field'] === 'serial_no' ? $filters['sort-direction'] : null">
                                SERIAL NO.
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('engine_no')"
                                :direction="$filters['sort-field'] === 'engine_no' ? $filters['sort-direction'] : null">
                                ENGINE NO.
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('acquisition_date')"
                                :direction="$filters['sort-field'] === 'acquisition_date' ? $filters['sort-direction'] : null">
                                ACQUISITION DATE
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('acquisition_cost')"
                                :direction="$filters['sort-field'] === 'acquisition_cost' ? $filters['sort-direction'] : null">
                                ACQUISITION COST
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('warranty_expiration')"
                                :direction="$filters['sort-field'] === 'warranty_expiration' ? $filters['sort-direction'] : null">
                                WARRANTY EXPIRATION
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('located')"
                                :direction="$filters['sort-field'] === 'located' ? $filters['sort-direction'] : null">
                                LOCATION
                            </x-table.head>
                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('remarks')"
                                :direction="$filters['sort-field'] === 'remarks' ? $filters['sort-direction'] : null">
                                REMARKS
                            </x-table.head>
                        </x-slot>

                        <x-slot name="body">
                            @if($selectPage)
                            <x-table.row class="bg-gray-300" wire:key="row-message">
                                <x-table.cell colspan="15" class="py-2">
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
                                    <span>{{ $item['name'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['description'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['type'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['make'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['brand'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['model'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['plate_no'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['serial_no'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['engine_no'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['acquisition_date'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['acquisition_cost'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['warranty_expiration'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['located'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item['remarks'] }}</span>
                                </x-table.cell>

                            </x-table.row>
                            @empty
                            <x-table.row wire:loading.class.delay="opacity-50">
                                <x-table.cell colspan="15">
                                    <div class="flex items-center justify-center">
                                       <x-icon.box-empty class="w-8 h-8 text-slate-400" />
                                        <span class="px-2 py-8 text-xl font-medium text-slate-400">No Records
                                            found...</span>
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                            @endforelse
                            <x-table.row class="bg-gray-300" wire:key="row-message">
                                <x-table.cell colspan="15" class="">
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
                    <div class="mb-4 space-y-3 overflow-y-auto max-h-96">
                        <div class="space-y-1 sm:col-span-2">
                            <label for="name" class="text-sm">EQUIPMENT NAME :</label>
                            <x-input wire:model.lazy="name" id="name" type="text"/>
                            @error('name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="description" class="text-sm">DESCRIPTION :</label>
                            <x-form.text-area wire:model.lazy="description" id="description" rows="3"></x-form.text-area>
                            @error('description')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="brtypeand" class="text-sm">TYPE :</label>
                            <x-input wire:model.lazy="type" id="type" type="text"/>
                            @error('type')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="make" class="text-sm">MAKE :</label>
                            <x-input wire:model.lazy="make" id="make" type="text"/>
                            @error('make')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="brand" class="text-sm">BRAND :</label>
                            <x-input wire:model.lazy="brand" id="brand" type="text"/>
                            @error('brand')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="model" class="text-sm">MODEL :</label>
                            <x-input wire:model.lazy="model" id="model" type="text"/>
                            @error('model')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="plate_no" class="text-sm">PLATE NO. :</label>
                            <x-input wire:model.lazy="plate_no" id="plate_no" type="text"/>
                            @error('plate_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="serial_no" class="text-sm">SERIAL NO. :</label>
                            <x-input wire:model.lazy="serial_no" id="serial_no" type="text"/>
                            @error('serial_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="engine_no" class="text-sm">ENGINE NO. :</label>
                            <x-input wire:model.lazy="engine_no" id="engine_no" type="text"/>
                            @error('engine_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="acquisition_date" class="text-sm">ACQUISITION DATE :</label>
                            <x-input wire:model.lazy="acquisition_date" id="acquisition_date" type="date"/>
                            @error('acquisition_date')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="acquisition_cost" class="text-sm">ACQUISITION COST :</label>
                            <x-input wire:model.lazy="acquisition_cost" id="acquisition_cost" type="text"/>
                            @error('acquisition_cost')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="warranty_expiration" class="text-sm">WARRANTY EXPIRATION:</label>
                            <x-input wire:model.lazy="warranty_expiration" id="warranty_expiration" type="date"/>
                            @error('warranty_expiration')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="located" class="text-sm">UNIT LOCATION :</label>
                            <x-form.text-area wire:model.lazy="located" id="located" rows="3"></x-form.text-area>
                            @error('located')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>
                        <div class="space-y-1 sm:col-span-2">
                            <label for="remarks" class="text-sm">REMARKS :</label>
                            <x-form.text-area wire:model.lazy="remarks" id="remarks" rows="3"></x-form.text-area>
                            @error('remarks')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                        </div>

                        @if ($exist_image && is_null($temp_image))
                            @forelse ($exist_image as $key=>$eimage)
                            <div class="relative">
                                <img src="{{ asset('images/'.$eimage['name']) }}" alt="Scanned images">
                                <button wire:click="removeImage({{ $eimage['id'] }},'{{ $key }}')" class="absolute top-0 right-0 px-2 py-1 mx-1 my-1 text-sm italic text-white bg-red-500 rounded hover:bg-red-800">
                                    Remove?
                                </button>
                              </div>

                            @empty
                            @endforelse
                        @endif

                        @if ($temp_image)
                            @forelse ($temp_image as $timage)
                                <img src="{{ $timage->temporaryUrl() }}" alt="Scanned images">
                            @empty

                            @endforelse
                        @endif

                        <div class="space-y-1 sm:col-span-2">
                            <label for="cover-photo" class="block text-sm text-gray-700 sm:mt-px sm:pt-2"> UPLOAD PHOTO (Optional) : </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="flex justify-center max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Click here to attach file</span>
                                        <input wire:model="temp_image" id="file-upload" type="file" class="sr-only" multiple>
                                    </label>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG/JPG up to 10MB</p>
                                </div>
                                </div>
                            </div>
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
