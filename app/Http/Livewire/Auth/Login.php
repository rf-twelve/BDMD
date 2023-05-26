<?php

namespace App\Http\Livewire\Auth;

use App\View\Components\auth\auth;
use Livewire\Component;

class Login extends Component
{
    public $username = '';
    public $password = '';

    protected $rules = [
        'username' => 'required',
        'password' => 'required'
    ];

    public function login()
    {
        $credentials = $this->validate();

        return auth()->attempt($credentials)
            ? to_route('dashboard',['user_id'=>auth()->user()->id])
            : $this->addError('username', trans('auth.failed'));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
