<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ListRoles extends Component
{
    public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function showAddroleSlideOver()
    {
        $this->dispatch('openPanel', 'New Role', 'App\Livewire\SlideOver\SlideOver');
    }

    #[On('role-created')]
    public function refreshRoles()
    {
        $this->roles = Role::all();
    }

    public function getRoleCount($role)
    {
        return $role->users()->count();
    }

    public function render()
    {
        return view('livewire.list-roles');
    }
}