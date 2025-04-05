<?php

namespace App\Livewire\SlideOver;

use App\GuardNameType;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class SlideOverEditUser extends Component
{
    public $user;
    public $isDropdownOpen = false;

    public function mount($userId = null)
    {
        if ($userId) {
            $this->user = \App\Models\User::find($userId);
        } else {
            $this->user = auth()->user();
        }
    }


    public function render()
    {
        return view('livewire.slide-over-edit-user');
    }
}