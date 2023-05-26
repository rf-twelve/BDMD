<?php

namespace App\Http\Livewire\Settings;

use App\Http\Livewire\Traits\WithPermissionsTrait;
use App\Http\Livewire\Traits\WithRolesTrait;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersManagement extends Component
{
    use WithRolesTrait, WithPermissionsTrait;

    public $selected_user;
    public $all_users;
    public $all_roles;
    public $all_permissions;
    public $user_role;
    public $user_permission;
    public $search = '';
    public $addRoleModal, $addPermissionModal;
    public $assign_role_confirmation, $assign_permission_confirmation;
    public $role_id;
    public $role_name;
    public $assign_user_role_id, $assign_user_role_name;
    public $assign_user_permission_id, $assign_user_permission_name;
    // public $permission_id;
    // public $permission_name;
    public $action_array = ['create','read','update','delete','access'];

    public function render()
    {
        // dd(User::ACTIONS);
        return view('livewire.settings.users-management',[
            'role_list' => $this->all_roles,
            'permission_list' => Permission::get()->groupBy('group'),
            'user_list' => $this->all_users,
        ]);
    }

    public function mount(){
        $this->all_users =  User::where('fullname','LIKE','%'."Ad".'%')->get();
        $this->all_roles =  Role::get();
        // $this->all_permissions =  User::get();
        $this->addRoleModal = false;
        $this->addPermissionModal = false;
        $this->assign_role_confirmation = false;
        $this->assign_permission_confirmation = false;
        $this->selectedUser(($this->all_users->first())['id']);
    }

    // public function updatedSearch(){
    //     $this->all_users = $this->all_users->where('fullname','LIKE','%'.$this->search.'%');
    //     $this->all_users = $this->all_users->where('fullname','LIKE','%'.$this->search.'%');
    // }

    public function togglePermissionForUser($permission)
    {
        $this->assign_user_permission_name = $permission;
        $this->assign_permission_confirmation = true;
    }

    public function selectedUser($id){
        $this->selected_user = $this->all_users->where('id',$id)->first();

        $get_role = '';
        $get_permissions = [];
        try {
            $get_role = $this->selected_user->getRoleNames()->first();
            $get_permissions = $this->selected_user->getPermissionNames();
        } catch (\Throwable $th) {
            dump($th);
        }
        $this->user_role = $get_role;
        $this->user_permission = $get_permissions;
    }

}
