<?php

namespace App\Http\Livewire\Traits;

use App\Models\User;
use Spatie\Permission\Models\Permission;

trait WithPermissionsTrait
{
    public $permission_modal = false;
    public $permission_id = null;
    public $permission_name;

    public function updatedPermissionName(){
        $this->permission_name = strtolower($this->permission_name);
    }

    public function resetPermissionVariables(){
        $this->permission_id = null;
        $this->permission_name = '';
    }
    ## CREATE Permission MODAL
    public function createPermissionModal()
    {
        $this->resetPermissionVariables();
        $this->permission_modal = true;
    }
    ## EDIT Permission MODAL
    public function editPermissionModal($group)
    {
        $this->permission_modal = true;
    }
    ## CLOSE Permission MODAL
    public function closePermissionModal()
    {
        $this->resetPermissionVariables();
        $this->permission_modal = false;
    }
    ## SAVE Permission MODAL
    public function savePermissionModal()
    {
        $this->validate([
            'permission_name' => 'required'
        ]);

        if (isset($this->permission_id)) {
            Permission::find()(['name' => $this->permission_name]);
            $this->notify('New Permission has been updated successfully!');
        }else{
            $count = 0;
            foreach (User::ACTIONS as $key => $value) {
                Permission::create([
                    'name' => $this->permission_name.'-'.$value,
                    'group' => $this->permission_name
                ]);
            };
            $this->notify('New Permission has been added successfully!');
        }
        $this->permission_modal = false;
        $this->resetPermissionVariables();

    }

    public function assignPermissionModal(){
        // $this->user_permission_model = $this->user_permission;
        $this->assign_permission_confirmation = true;
        $this->user_permission_model = $this->user_permission;
    }
    public function userPermissionEdit($key){
        dd($key);
        $this->edit_permission_key = $key;
    }
    public function saveUserPermission(){
        $permission = Permission::where('name',$this->assign_user_permission_name)->first();
        $check = $this->selected_user->permissions->where('id',$permission['id']);
        if(count($check) > 0){
            $this->selected_user->revokePermissionTo($permission);
        }else{
            $this->selected_user->givePermissionTo($permission);
        }
        $this->user_permission = $this->selected_user->getPermissionNames();
        $this->assign_permission_confirmation = false;
        $this->notify('User Permission has been updated successfully!');
    }
    public function closeAssignPermission(){
       $this->assign_permission_confirmation = false;
        // dump($value);
        // dd($action);
    }



}
