<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ListRoles extends Component
{
    public $roles;
    public $showSlideOver = false;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function showAddroleSlideOver()
    {
        if ($this->showSlideOver === true) {
            return $this->showSlideOver = false;
        }
        
        $this->showSlideOver = true;
    }
    #[On('close-slide-over')]
    public function hideSlideOver()
    {
        $this->showSlideOver = false;
    }

    public function render()
    {
        return view('livewire.list-roles');
    }
}
