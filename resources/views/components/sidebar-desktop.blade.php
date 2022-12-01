<div
    class="hidden lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 lg:border-r lg:border-gray-200 lg:pt-5 lg:pb-4 lg:bg-gray-100">
    <div class="flex items-center flex-shrink-0 px-6">
        <img class="w-auto h-8" src="{{ asset('img/dts/logo.png') }}" alt="Workflow">
        <span class="flex flex-col flex-1 min-w-0 pl-2">
            <span class="text-sm font-medium text-gray-900 truncate">LGU KALIBO</span>
            <span class="text-sm text-gray-500 truncate">Province of Aklan</span>
        </span>
    </div>
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-1 h-0 mt-4 overflow-y-auto">
        <!-- User account dropdown -->
        <div x-data="{userDropdown:false}" class="relative inline-block px-3 mt-1 text-left">
            <div>
                <button x-on:click="userDropdown=!userDropdown" type="button"
                    class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500"
                    id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="flex items-center justify-between w-full">
                        <span class="flex items-center justify-between min-w-0 space-x-3">
                            <img class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full"
                                src="{{ asset('img/users/avatar.png') }}" alt="">
                            <span class="flex flex-col flex-1 min-w-0">
                                <span class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->fullname
                                    }}</span>
                                <span class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                            </span>
                        </span>
                        <!-- Heroicon name: solid/selector -->
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
            </div>

            <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
            <div x-show="userDropdown" @click.outside="userDropdown = false"
                class="absolute left-0 right-0 z-10 mx-3 mt-1 origin-top bg-white divide-y divide-gray-200 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
                <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="options-menu-item-0">View profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="options-menu-item-1">Settings</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="options-menu-item-2">Notifications</a>
                </div>
                <div class="py-1" role="none">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="options-menu-item-3">Get desktop app</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="options-menu-item-4">Support</a>
                </div>
                <div class="py-1" role="none">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="options-menu-item-5">Logout</a>
                </div>
            </div>
        </div>
        <!-- Sidebar Search -->
        <div class="px-3 mt-5">
            <label for="search" class="sr-only">Search</label>
            <div class="relative mt-1 rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none" aria-hidden="true">
                    <!-- Heroicon name: solid/search -->
                    <svg class="w-4 h-4 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="text" name="search" id="search"
                    class="block w-full py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-9 sm:text-sm"
                    placeholder="Searched">
            </div>
        </div>
        <!-- Navigation -->
        <nav class="px-3 mt-6">
            <div class="space-y-1">
                <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-700 hover:text-gray-900 hover:bg-gray-50" -->
                <a href="#"
                    class="flex items-center px-2 py-2 text-sm font-medium text-gray-900 bg-gray-200 rounded-md group"
                    aria-current="page">
                    <!--
                    Heroicon name: outline/home

                    Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
                  -->
                    <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                </a>

                <a href="#"
                    class="flex items-center px-2 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50 group">
                    <!-- Heroicon name: outline/view-list -->
                    <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    My tasks
                </a>

                <a href="#"
                    class="flex items-center px-2 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50 group">
                    <!-- Heroicon name: outline/clock -->
                    <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Recent
                </a>
            </div>
            <div class="mt-8">
                <!-- Secondary navigation -->
                <h3 class="px-3 text-xs font-semibold tracking-wider text-gray-500 uppercase"
                    id="desktop-teams-headline">CONNECTION STATUS</h3>
                <div class="mt-1 space-y-1" role="group" aria-labelledby="desktop-teams-headline">
                    <a href="#"
                        class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                        <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
                        <span class="truncate"> Engineering </span>
                    </a>

                    <a href="#"
                        class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                        <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span>
                        <span class="truncate"> Server: 192.168.82.6 </span>
                    </a>

                    <a href="#"
                        class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                        <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span>
                        <span class="truncate"> Customer Success </span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
