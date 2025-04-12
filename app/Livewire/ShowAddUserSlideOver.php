<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\HasNotifications;
use Spatie\Permission\Models\Role;

class ShowAddUserSlideOver extends Component
{
    use HasNotifications;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;
    public $roles;
    public $isDropdownOpen = false;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $role = Role::find($this->role);
        
        $this->reset(['name', 'email', 'password', 'password_confirmation', 'role']);
        $this->dispatch('closePanel');
        $this->dispatch('user-created');

        $this->notification(
            'User Created',
            'The user has been created successfully.',
            'success'
        );
    }

    public function render()
    {
        return view('livewire.show-add-user-slide-over');
    }
}