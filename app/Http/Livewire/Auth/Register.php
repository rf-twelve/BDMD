<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $fullname = '';
    public $username = '';
    public $password = '';
    public $passwordConfirmation = '';

    protected $rules = [
        'fullname' => 'required',
        'username' => 'required|min:4|unique:users',
        'password' => 'required|same:passwordConfirmation'
    ];

    public function updateUsername()
    {
        $this->validate(['username' => 'unique:users']);
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'fullname' => $this->fullname,
            'username' => $this->username,
            'password' => Hash::make($this->password),
        ]);

        auth()->login($user);

        $this->notify('Successfully registered!');

        return to_route('Dashboard',['user_id'=>auth()->user()->id]);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
