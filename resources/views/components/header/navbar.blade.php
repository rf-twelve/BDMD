<nav class="text-white bg-blue-600 border-2 border-gray-300" x-data="{userDropdown:false, openMenuMobile:false}">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            {{-- <img class="w-8 h-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-300.svg" alt="Workflow"> --}}
            <div class="flex items-center flex-shrink-0 px-6">
                <img class="w-auto h-8" src="{{ $company ? $company->logoUrl() : '' }}" alt="Logo">
                <span class="flex flex-col flex-1 min-w-0 pl-2">
                    <span class="text-sm font-medium truncate">{{ $company ? $company->name : '' }}</span>
                    <span class="text-sm truncate">{{ $company ? $company->address : '' }}</span>
                </span>
            </div>
        </div>
          <div class="hidden md:block">
            <div class="flex items-baseline ml-10 space-x-4">
              {{ $slot }}
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="flex items-center ml-4 md:ml-6">
            <button type="button" class="p-1 text-gray-200 bg-gray-500 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-600 focus:ring-white">
              <span class="sr-only">View notifications</span>
              <!-- Heroicon name: outline/bell -->
              <x-icon.bell class="w-6 h-6" />
            </button>

            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button x-on:click="userDropdown = !userDropdown" type="button" class="flex items-center max-w-xs text-sm text-white bg-gray-500 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:bg-indigo-500 focus:ring-blue-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-8 h-8 rounded-full" src="{{ auth()->user()->imageUrl() }}" alt="User Profile">
                </button>
              </div>

              <div @click.away="userDropdown=false" x-show="userDropdown" class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <a onclick="window.open('{{ route('profile-settings',['user_id'=>Auth::user()->id]) }}','_blank')" href="#"
                    class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                    id="options-menu-item-0">View profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                    id="options-menu-item-2">Notifications</a>
                <a wire:click='logout()' href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                    id="options-menu-item-5">Logout</a>
              </div>
            </div>
          </div>
        </div>

        <div class="flex -mr-2 md:hidden">
          <!-- Mobile menu button -->
          <button x-on:click="openMenuMobile =! openMenuMobile" type="button" class="inline-flex items-center justify-center p-2 text-indigo-200 bg-gray-500 rounded-md hover:text-white hover:bg-blue-500 hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-500 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="openMenuMobile" class="md:hidden" id="mobile-menu">
      {{-- <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <!-- Current: "bg-indigo-700 text-white", Default: "text-white hover:bg-indigo-500 hover:bg-opacity-75" -->
        <a href="#" class="block px-3 py-2 text-base font-medium bg-gray-400 rounded-md hover:text-white" aria-current="page">Dashboard</a>

        <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:text-white hover:bg-indigo-500 hover:bg-opacity-75">Team</a>

        <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:text-white hover:bg-indigo-500 hover:bg-opacity-75">Projects</a>

        <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:text-white hover:bg-indigo-500 hover:bg-opacity-75">Calendar</a>

        <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:text-white hover:bg-indigo-500 hover:bg-opacity-75">Reports</a>
      </div>
      <div class="pt-4 pb-3 border-t border-gray-700">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="w-10 h-10 rounded-full" src="{{ asset('img/users/avatar.png') }}" alt="User profile">
          </div>
          <div class="ml-3">
            <div class="text-base font-medium">{{ auth()->user()->fullname }}</div>
            <div class="text-sm font-medium text-gray-500">{{ auth()->user()->email }}</div>
          </div>
          <button type="button" class="flex-shrink-0 p-1 ml-auto text-gray-200 bg-gray-500 border-2 border-transparent rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-600 focus:ring-white">
            <span class="sr-only">View notifications</span>
            <!-- Heroicon name: outline/bell -->
            <x-icon.bell class="w-6 h-6" />
          </button>
        </div>
        <div class="px-2 mt-3 space-y-1">
            <a onclick="window.open('{{ route('Profile Settings',['user_id'=>Auth::user()->id]) }}','_blank')" href="#"
                class="block px-4 py-2 text-sm" id="options-menu-item-0">View profile</a>
            <a href="#"
                class="block px-4 py-2 text-sm" id="options-menu-item-2">Notifications</a>
            <a wire:click='logout()' href="#"
                class="block px-4 py-2 text-sm" id="options-menu-item-5">Logout</a>
        </div>
      </div> --}}
    </div>
  </nav>
