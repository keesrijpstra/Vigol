<?php

namespace App\Livewire\SlideOver;

use App\GuardNameType;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class SlideOver extends Component
{
    public $guards = [];
    public $guard = 'web';
    public $name = '';
    public $isDropdownOpen = false;

    public function mount()
    {
        $this->guards = collect(GuardNameType::cases())
        ->map(function($guardType) {
            return [
                'value' => $guardType->value,
                'label' => $guardType->label ?? $guardType->value,
            ];
        });
    }

    public function toggleDropdown()
    {
        $this->isDropdownOpen = !$this->isDropdownOpen;
    }
    
    public function selectGuard($guard)
    {
        $this->guard = $guard;
        $this->isDropdownOpen = false;
    }
    
    public function save()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'guard' => 'required',
        ]);
        
        Role::create([
            'name' => $this->name,
            'guard_name' => $this->guard,
        ]);
        
        $this->reset(['name', 'guard']);
        $this->dispatch('closePanel');
        $this->dispatch('role-created');
    }

    public function render()
    {
        return view('livewire.slide-over');
    }
}