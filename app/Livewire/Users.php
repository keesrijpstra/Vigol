<?php

namespace App\Livewire;

use Livewire\Component;

class Users extends Component
{
    public $users;

    public function mount()
    {
        $this->users = \App\Models\User::all();
    }
    public function render()
    {
        return view('livewire.users');
    }
}
