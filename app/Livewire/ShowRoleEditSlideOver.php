<?php

namespace App\Livewire;

use Livewire\Component;

class ShowRoleEditSlideOver extends Component
{
    public $role;

    public function mount($role)
    {
        $this->role = $role;
    }
    public function updateRole()
    {
        $this->validate([
            'role.name' => 'required|string|max:255',
        ]);

        $this->role->save();

        $this->dispatch('role-updated');
    }
    public function deleteRole()
    {
        $this->role->delete();

        $this->dispatch('role-deleted');
    }
    public function closeSlideOver()
    {
        $this->dispatch('closePanel');
    }
    public function render()
    {
        return view('livewire.show-role-edit-slide-over');
    }
}
