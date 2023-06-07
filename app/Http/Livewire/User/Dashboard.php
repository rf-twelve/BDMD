<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        return view('livewire.user.dashboard',[
        ]);
    }

    public function logout() {
        auth()->logout(); return redirect('/');
    }
}
