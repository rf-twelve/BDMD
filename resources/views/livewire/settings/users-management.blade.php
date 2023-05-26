<div x-data="{openSidebarMobile:false}">
    <div class="min-h-screen bg-gray-100 ">
        <x-sidebar-mobile />

        {{-- ##################### --}}
        <!-- Static sidebar for desktop -->
        <x-sidebar-desktop />

        <!-- Main column -->
        <div class="flex flex-col lg:pl-64">

            <!-- Topbar Mobile -->
            {{-- <x-topbar-mobile /> --}}

            <main class="flex-1">

    <!-- Topbar Desktop -->
    <x-topbar-desktop>
        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"aria-hidden="true">
                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                </svg>
                <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                    USER MANAGEMENT
                </a>
            </div>
        </li>
    </x-topbar-desktop>


<div class="relative z-0 overflow-hidden bg-white sm:flex">
    <div class="relative z-0 flex-1 overflow-y-auto focus:outline-none xl:order-last">

        <article>
        <!-- Profile header -->
        <div>
            <div>
            <img class="object-cover w-full h-32 lg:h-48" src="{{ asset('img\users\users-mgt.jpg') }}" alt="user managment background">
            </div>
            <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                <div class="flex">
                <img class="w-24 h-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32" src="{{ asset('img\users\avatar.png') }}" alt="user profile">
                </div>
                <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                <div class="flex-1 min-w-0 mt-6 2xl:block">
                    <h1 class="text-2xl font-bold text-gray-900 truncate">{{ $selected_user->fullname }}</h1>
                </div>
                <div class="flex flex-col mt-6 space-y-3 justify-stretch sm:flex-row sm:space-y-0 sm:space-x-4">
                    <button type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                    <x-icon.edit class="w-4 h-4" />
                    <span>Modify</span>
                    </button>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Description list -->
        <div class="mx-3 mt-10 mb-10">
            <form wire:submit.prevent="save" enctype="multipart/form-data" class="grid grid-cols-1 font-medium gap-y-6 sm:grid-cols-2 sm:gap-x-8">
              {{-- <div class="space-y-1 sm:col-span-2">
                  <label for="class" class="text-sm">Classification :</label><br>
                  <x-select wire:model.lazy="editing.class" id="class" class="w-full border">
                      <option value="">-Select document type-</option>
                      @foreach (App\Models\Doc::CLASS_OF_DOC as $value => $label)
                          <option value="{{ $value }}">{{ $label }}</option>
                      @endforeach
                  </x-select>
                  @error('editing.class')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
              </div> --}}
              <div class="space-y-1 sm:col-span-2">
                  <label for="fullname" class="text-sm">FULLNAME :</label>
                  <x-input value="{{$selected_user->fullname}}" id="fullname" type="text" />
              </div>

              <div class="space-y-1 sm:col-span-2">
                  <label for="username" class="text-sm">USERNAME :</label>
                  <x-input value="{{$selected_user->username}}" id="username" type="text" />
              </div>

              <div class="space-y-1 sm:col-span-2">
                  <label for="email" class="text-sm">EMAIL :</label>
                  <x-input value="{{$selected_user->email}}" id="email" type="email" />
              </div>
              {{-- <div class="space-y-1 sm:col-span-2">
                  <label for="email" class="text-sm">EMAIL :</label>
                  <x-input wire:model.lazy="selected_user.email" id="email" type="email" />
                  @error('selected_user.email')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
              </div> --}}

              {{-- ROLES TABLE --}}
              <div class="space-y-1 sm:col-span-2">
                <label class="text-sm">ROLE :</label>
                @forelse ($role_list as $value => $label)
                <div class="flex items-center h-5">
                    <input wire:click="assignUserRole({{ $label }})" {{ $label->name == $user_role ? 'checked' : '' }} name="role" id="index{{ $value }}" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <label for="index{{ $value }}" class="ml-3 text-sm font-medium text-gray-700">
                        {{ $label->name}}
                    </label>
                    <a href="#" wire:click.defer="editRoleModal({{ $label }})">
                        <x-icon.edit class="w-4 ml-2" />
                    </a>

                </div>
                @empty
                @endforelse
                <x-button wire:click="createRoleModal" type="button" class="hover:bg-blue-500 hover:text-white">
                   + Add Role
                </x-button>
            </div>
              {{-- PERMISION TABLE --}}
              <div class="space-y-1 sm:col-span-2">
                <label class="text-sm">PERMISSION :</label>
                <table class="min-w-full divide-y divide-gray-300 table-fixed">
                    <thead class="bg-gray-50">
                    <tr class="py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                        <th scope="col">NAME</th>
                        <th scope="col">ACCESS</th>
                        <th scope="col">CREATE</th>
                        <th scope="col">READ</th>
                        <th scope="col">UPDATE</th>
                        <th scope="col">DELETE</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($permission_list as $value => $permission)
                    <tr>
                        <td>{{ strtoupper($value) }}</td>
                        @foreach (App\Models\User::ACTIONS as $action)
                        <td>
                            <a href="#" wire:click="togglePermissionForUser('{{ $value.'-'.$action }}')" >
                                @if ($user_permission->contains($value.'-'.$action))
                                    <x-icon.circle-check class="w-6 h-6 text-blue-500" />
                                @else
                                    <x-icon.circle-times class="w-6 h-6 text-red-500" />
                                @endif
                            </a>
                        </td>
                        @endforeach
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center">No Permission Found!</td></tr>
                    @endforelse


                    <!-- More people... -->
                    </tbody>
                </table>
                {{-- <x-button wire:click="assignPermissionModal()" type="button" class="hover:bg-blue-500 hover:text-white">
                    Set User Permission
                </x-button> --}}
                <x-button wire:click="createPermissionModal()" type="button" class="hover:bg-blue-500 hover:text-white">
                    + Add Permission
                </x-button>
              </div>
            </form>
        </div>

        </article>
    </div>
    <aside class="flex-shrink-0 border-r border-gray-200 xl:order-first xl:flex xl:flex-col w-96">
        <div class="px-6 pt-6 pb-4">
        <h2 class="text-lg font-medium text-gray-900">Directory</h2>
        <p class="mt-1 text-sm text-gray-600">Search directory of {{ $all_users->count() }} employees</p>
        <form class="flex mt-6 space-x-4" action="#">
            <div class="flex-1 min-w-0">
            <label for="search" class="sr-only">Search</label>
            <div class="relative rounded-md shadow-sm">
                <div class="flex">
                    <div class="relative flex items-stretch flex-grow focus-within:z-10">
                        <x-form.input-text wire:model='search' type="search" placeholder="Enter keywords..." class="pl-2 border rounded-none rounded-l-md"/>
                    </div>
                    <x-form.button class="relative inline-flex items-center -ml-px space-x-2 border-gray-300 rounded-none rounded-r-md bg-gray-50 hover:bg-gray-100">
                        <x-icon.search class="w-6 h-6" /><span></span>
                    </x-form.button>
                </div>
            </div>
            </div>
        </form>
        </div>
        <!-- Directory list -->
        <nav class="flex-1 min-h-0 overflow-y-auto" aria-label="Directory">
        <div class="relative">
            <div class="sticky top-0 z-10 px-6 py-1 text-sm font-medium text-gray-500 border-t border-b border-gray-200 bg-gray-50">
            <h3>LIST OF USERS</h3>
            </div>
            <ul role="list" class="relative z-0 divide-y divide-gray-200">
                @forelse ($user_list as $list)
                    <li wire:click.defer="selectedUser({{ $list->id }})">
                        <div class="relative flex items-center px-6 py-5 space-x-3 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-500">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full" src="{{ asset('img\users\avatar.png') }}" alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="#" class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            <p class="text-sm font-medium text-gray-900">{{ $list->fullname }}</p>
                            <p class="text-sm text-gray-500 truncate">{{ $list->username }}</p>
                            </a>
                        </div>
                        </div>
                    </li>
                @empty
                    <li class="pt-2 text-center">Record not found!</li>
                @endforelse

            </ul>
        </div>

        </nav>
    </aside>

    {{-- ADD ROLES MODAL --}}
    <x-modal.dialog wire:model="addRoleModal" maxWidth="sm">
        <x-slot name="title">
            ROLE
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <label for="role_name" class="text-sm">Role Name :</label>
                <x-input wire:model.lazy="role_name" id="role_name" type="text" autocomplete="off" placeholder="Enter Name"/>
                @error('role_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="closeRoleModal()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                {{ __('Cancel') }}
            </x-button>
            <x-button wire:click="saveRoleModal()" type="button" class="hover:bg-blue-500 hover:text-white">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-modal.dialog>

    {{-- ADD PERMISSION MODAL --}}
    <x-modal.dialog wire:model="permission_modal">
        <x-slot name="title">
            PERMISSION
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <label for="permission_name" class="text-sm">Permission Name :</label>
                <x-input wire:model.debounce.500="permission_name" id="permission_name" type="text" autocomplete="off" placeholder="Enter Name"/>
                @error('permission_name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
            </div>
            <div class="col-span-6 sm:col-span-4">

            @if ($permission_name != null || $permission_name != "")
            <ul role="list" class="divide-y divide-gray-200">
                <li class="relative px-4 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                <div class="flex justify-between space-x-3">
                    <div class="flex-1 min-w-0">
                    <span href="#" class="block focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        <p class="text-sm font-medium text-gray-900 truncate">Note: List of permissions will be created.</p>
                        <p class="text-sm text-gray-500 truncate">{{ $permission_name."-access" }} -
                            <i>Permission to access.</i></p>
                        <p class="text-sm text-gray-500 truncate">{{ $permission_name."-create" }} -
                            <i>Permission to create.</i></p>
                        <p class="text-sm text-gray-500 truncate">{{ $permission_name."-read" }} -
                            <i>Permission to read.</i></p>
                        <p class="text-sm text-gray-500 truncate">{{ $permission_name."-update" }} -
                            <i>Permission to update.</i></p>
                        <p class="text-sm text-gray-500 truncate">{{ $permission_name."-delete" }} -
                            <i>Permission to delete.</i></p>
                    </span>
                    </div>
                </div>
                </li>
            </ul>
            @endif


            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button wire:click="closePermissionModal()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                {{ __('Cancel') }}
            </x-button>
            <x-button wire:click="savePermissionModal()" type="button" class="hover:bg-blue-500 hover:text-white">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-modal.dialog>

    <!-- ASSIGN USER ROLE CONFIRMATION -->
    <div>
        <form wire:submit.prevent="saveUserRole">
            <x-modal.confirmation wire:model.defer="assign_role_confirmation" selectedIcon="confirm">
                <x-slot name="title">Role Confirmation</x-slot>

                <x-slot name="content">
                    <div class="py-8 text-gray-700">Assign this role "{{ $assign_user_role_name }}"?.</div>
                </x-slot>

                <x-slot name="footer">
                    <x-button type="button" wire:click.prevent="$set('assign_role_confirmation', false)">Cancel</x-button>

                    <x-button type="submit">Yes</x-button>
                </x-slot>
            </x-modal.confirmation>
        </form>
    </div>

    <!-- ASSIGN USER PERMISSION CONFIRMATION -->
    <div>
        <form wire:submit.prevent="saveUserPermission">
            <x-modal.confirmation wire:model.defer="assign_permission_confirmation" selectedIcon="confirm">
                <x-slot name="title">Permission Confirmation</x-slot>

                <x-slot name="content">
                    <div class="py-8 text-gray-700">Assign or remove if exist this permission "{{ $assign_user_permission_name }}" permission?</div>
                </x-slot>

                <x-slot name="footer">
                    <x-button type="button" wire:click.prevent="$set('assign_permission_confirmation', false)">Cancel</x-button>

                    <x-button type="submit">Yes</x-button>
                </x-slot>
            </x-modal.confirmation>
        </form>
    </div>

    <!-- ASSIGN USER PERMISSION CONFIRMATION -->
        {{-- <x-modal.dialog wire:model="assign_permission_confirmation">
            <x-slot name="title">
                Set User Permission
            </x-slot>

            <x-slot name="content">
                <form wire:submit.prevent="saveUserPermission()">
                    <table class="min-w-full divide-y divide-gray-300 table-fixed">
                        <thead class="bg-gray-50">
                        <tr class="py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                            <th scope="col">NAME</th>
                            <th scope="col">CREATE</th>
                            <th scope="col">READ</th>
                            <th scope="col">UPDATE</th>
                            <th scope="col">DELETE</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($permission_list as $value => $permission)
                            <tr>
                                <td>{{ strtoupper($value) }}</td>
                                @foreach (App\Models\User::ACTIONS as $action)
                                <td>
                                    {{ $value.'-'.$action }}
                                    <a href="#" wire:click="togglePermissionForUser('{{ $value.'-'.$action }}')" >
                                    @if ($user_permission->contains($value.'-'.$action))
                                        <x-icon.circle-check class="w-6 h-6 text-blue-500" />
                                    @else
                                        <x-icon.circle-times class="w-6 h-6 text-red-500" />
                                    @endif
                                    </a>

                                </td>
                                @endforeach
                            </tr>
                            @empty
                            <tr><td colspan="5" class="text-center">No Permission Found!</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <x-button type="submit" class="hover:bg-blue-500 hover:text-white">
                        {{ __('Save') }}
                    </x-button>
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-button wire:click="closeAssignPermission()" type="button" class="text-white bg-gray-400 hover:bg-gray-500">
                    {{ __('Close') }}
                </x-button>
            </x-slot>
        </x-modal.dialog> --}}
    </div>
</div>


            </main>
        </div>
    </div>
</div>
