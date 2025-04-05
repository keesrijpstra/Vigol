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

    public function showEditUserSlideOver($userId)
    {
        $user = \App\Models\User::find($userId);
        $this->dispatch('openPanel', 'Edit User Debug', 'App\Livewire\SlideOver\SlideOver', []);
    }
    
    public function render()
    {
        return view('livewire.users');
    }
}
