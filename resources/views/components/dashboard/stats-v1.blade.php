<div class="px-4 mt-2 sm:px-6 lg:px-8">
    <h2 class="text-xs font-medium tracking-wide text-gray-500 uppercase">Document Status</h2>
    <ul role="list" class="grid grid-cols-1 gap-4 mt-3 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4"
        x-max="1">

        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div
                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-indigo-500 rounded-l-md">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div
                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Charge Slip
                    </a>
                    <p class="text-gray-500">
                        {{-- <span class="text-white rounded-xl bg-indigo-500 px-2.5 py-0.5 mr-2"> --}}
                            {{ $charge_slip_count }}
                        {{-- </span> --}}
                        Records
                    </p>
                </div>
            </div>
        </li>
        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div
                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-indigo-500 rounded-l-md">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div
                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Equipment
                    </a>
                    <p class="text-gray-500">
                        {{-- <span class="text-white rounded-xl bg-indigo-500 px-2.5 py-0.5 mr-2"> --}}
                            {{ $equipment_count }}
                        {{-- </span> --}}
                        Records
                    </p>
                </div>
            </div>
        </li>
        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div
                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-indigo-500 rounded-l-md">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div
                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Machinery
                    </a>
                    <p class="text-gray-500">
                        {{-- <span class="text-white rounded-xl bg-indigo-500 px-2.5 py-0.5 mr-2"> --}}
                            {{ $machinery_count }}
                        {{-- </span> --}}
                        Records
                    </p>
                </div>
            </div>
        </li>
        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div
                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-indigo-500 rounded-l-md">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div
                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Maintenance Request
                    </a>
                    <p class="text-gray-500">
                        {{-- <span class="text-white rounded-xl bg-indigo-500 px-2.5 py-0.5 mr-2"> --}}
                            {{ $maintenance_request_count }}
                        {{-- </span> --}}
                        Records
                    </p>
                </div>
            </div>
        </li>
        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div
                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-indigo-500 rounded-l-md">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div
                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Vehicle
                    </a>
                    <p class="text-gray-500">
                        {{-- <span class="text-white rounded-xl bg-indigo-500 px-2.5 py-0.5 mr-2"> --}}
                            {{ $vehicle_count }}
                        {{-- </span> --}}
                        Records
                    </p>
                </div>
            </div>
        </li>
        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div
                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-indigo-500 rounded-l-md">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div
                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Work Order Slip
                    </a>
                    <p class="text-gray-500">
                        {{-- <span class="text-white rounded-xl bg-indigo-500 px-2.5 py-0.5 mr-2"> --}}
                            {{ $work_order_slip_count }}
                        {{-- </span> --}}
                        Records
                    </p>
                </div>
            </div>
        </li>


    </ul>
</div>
