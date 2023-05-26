<div x-data="{disabled:true, finalize:false}" class="relative flex flex-col min-h-screen overflow-hidden bg-gray-50">
    <nav class="flex bg-blue-500 border-b border-gray-200" aria-label="Breadcrumb">
        <ol role="list" class="flex w-full max-w-screen-xl px-4 mx-auto space-x-4 sm:px-6 lg:px-8">
            <li class="flex">
                <div class="flex items-center">
                    <a href="{{ route('dashboard',['user_id'=>auth()->user()->id]) }}"
                        class="text-white hover:font-semibold">
                        <!-- Heroicon name: solid/home -->
                        <x-icon.home class="flex-shrink-0 w-5 h-5" />
                        <span class="sr-only">Home</span>
                    </a>
                </div>
            </li>
            <li class="flex">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                    <a href="{{ url()->previous() }}" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Equipment
                    </a>
                </div>
            </li>
            <li class="flex">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                    <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Edit
                    </a>
                </div>
            </li>

        </ol>
    </nav>

    <div class="sm:h-8"></div>

    <div
        class="relative w-full px-6 pt-4 pb-4 bg-white shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">

        <div class="max-w-lg mx-auto">
            <div class="divide-y divide-gray-300/50">
                <div class="space-y-4 text-base leading-7 text-gray-600">

                    <div class="mt-4">
                        <form wire:submit.prevent="save" enctype="multipart/form-data"
                            class="grid grid-cols-1 font-medium gap-y-4 sm:grid-cols-2 sm:gap-x-8">

                            <div class="space-y-1 sm:col-span-2">
                                <label for="make" class="text-sm">Type/Make :</label>
                                <x-input wire:model.lazy="make" id="make" type="text" placeholder="Enter type/make" />
                                @error('make')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>

                            <div class="space-y-1 sm:col-span-2">
                                <label for="brand" class="text-sm">Brand :</label>
                                <x-input wire:model.lazy="brand" id="brand" type="text"
                                    placeholder="Enter brand name" />
                                @error('brand')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>

                            <div class="space-y-1 sm:col-span-2">
                                <label for="model" class="text-sm">Model :</label>
                                <x-input wire:model.lazy="model" id="model" type="text"
                                    placeholder="Enter model name" />
                                @error('model')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>

                            <div class="space-y-1 sm:col-span-2">
                                <label for="year" class="text-sm">Year :</label>
                                <x-input wire:model.lazy="year" id="year" type="text" placeholder="Enter year model" />
                                @error('year')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>

                            <div class="space-y-1 sm:col-span-2">
                                <label for="plate_no" class="text-sm">Plate No. :</label>
                                <x-input wire:model.lazy="plate_no" id="plate_no" type="text"
                                    placeholder="Enter plate number" />
                                @error('plate_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>

                            <div class="space-y-1 sm:col-span-2">
                                <label for="serial_no" class="text-sm">Serial No. :</label>
                                <x-input wire:model.lazy="serial_no" id="serial_no" type="text"
                                    placeholder="Enter serial number" />
                                @error('serial_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>

                            <div class="space-y-1 sm:col-span-2">
                                <label for="engine_no" class="text-sm">Engine No. :</label>
                                <x-input wire:model.lazy="engine_no" id="engine_no" type="text"
                                    placeholder="Enter engine number" />
                                @error('engine_no')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>

                            <div class="space-y-1 sm:col-span-2">
                                <label for="acquisition_date" class="text-sm">Acquisition Date :</label>
                                <x-input wire:model.lazy="acquisition_date" id="acquisition_date" type="date"
                                    placeholder="Enter date" />
                                @error('acquisition_date')<x-comment class="text-red-500">*{{ $message }}</x-comment>
                                @enderror
                            </div>

                            <div class="space-y-1 sm:col-span-2">
                                <label for="acquisition_cost" class="text-sm">Acquisition Cost :</label>
                                <x-input wire:model.lazy="acquisition_cost" id="acquisition_cost" type="text"
                                    placeholder="Enter cost ammount" />
                                @error('acquisition_cost')<x-comment class="text-red-500">*{{ $message }}</x-comment>
                                @enderror
                            </div>

                            <div class="space-y-1 sm:col-span-2">
                                <label for="remarks" class="text-sm">Remarks :</label>
                                <div class="mt-1">
                                    <textarea wire:model.lazy="remarks" rows="4" id="remarks"
                                        class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                </div>
                                @error('remarks')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                            </div>

                            @if ($display_temp_images)
                            <div class="sm:col-span-2">
                                <label class="text-sm">Attached Image(s) :</label>
                            </div>
                            @forelse ($display_temp_images as $image)
                            <div class="relative">
                                <img src="{{ $image->imageUrl() }}" alt="Images">
                                <button type="button" wire:click.prevent="removeImage({{ $image['id'] }})" class="absolute top-0 px-2 m-2 text-white bg-red-500 rounded hover:bg-red-400">Remove?</button>
                            </div>

                            @empty
                            @endif
                            @endif

                            @if ($temp_images)
                            <div class="sm:col-span-2">
                                <label class="text-sm">New Image(s) :</label>
                            </div>
                            @forelse ($temp_images as $index=>$image)
                            <div class="relative">
                                <img src="{{ $image->temporaryUrl() }}" alt="Images">
                                {{-- <button type="button" wire:click.prevent="removeTempImage({{ $index }})" class="absolute top-0 px-2 m-2 text-white bg-red-500 rounded hover:bg-red-400">Remove?</button> --}}
                            </div>
                            @empty
                            @endif
                            @endif

                            <div class="space-y-1 sm:col-span-2">
                                <label for="cover-photo"
                                    class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Attach
                                    files(Optional) : </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <div
                                        class="flex justify-center max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor"
                                                fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="file-upload"
                                                    class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Attach file(Optional) :</span>
                                                    <input wire:model.debounce.500="temp_images" id="file-upload"
                                                        type="file" class="sr-only" multiple>
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                        </div>
                                    </div>
                                </div>
                                @error('temp_images')<x-comment class="text-red-500">*{{ $message }}</x-comment>
                                @enderror
                            </div>

                            {{-- Save buttons --}}

                            <div class="flex justify-end space-x-2 sm:col-span-2">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('equipments',['user_id',auth()->user()->id]) }}"
                                        class="px-3 py-1 bg-gray-300 rounded-md hover:bg-gray-500 hover:text-white">
                                        Back
                                    </a>
                                    <x-button type="submit" class="text-white bg-blue-500 hover:bg-blue-600">
                                        Save
                                    </x-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sm:h-8"></div>
</div>
