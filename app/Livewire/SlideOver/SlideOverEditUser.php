<?php

namespace App\Livewire\SlideOver;

use App\Models\User;
use App\GuardNameType;
use Livewire\Component;
use App\HasNotifications;
use App\Livewire\Notification;
use Spatie\Permission\Models\Role;

class SlideOverEditUser extends Component
{
    use HasNotifications;

    public $user;
    public $name;
    public $email;
    public $password;
    public $role;
    public $roles;
    public $isDropdownOpen = false;

    public function mount($userId = null)
    {
        $this->roles = Role::all();

        if(!$userId) {
            $this->notification(
                'User Not Found',
                'The user ID provided is invalid.',
                'error'
            );
            return;
        }

        $user = User::find($userId);

        if (!$user) {
            $this->notification(
                'User Not Found',
                'The user ID provided does not exist.',
                'error'
            );
            return;
        }

        $this->user = $user;

        if (!$user?->name)
        {
            $this->notification(
                'User Not Found',
                'The user ID provided does not have a name.',
                'error'
            );
            return;
        }

        $this->name = $user->name;

        if (!$user?->email)
        {
            $this->notification(
                'User Not Found',
                'The user ID provided does not have an email.',
                'error'
            );
            return;
        }

        $this->email = $user->email;

        if (!$user->password)
        {
            $this->notification(
                'User Not Found',
                'The user ID provided does not have a password.',
                'error'
            );
            return;
        }

        $this->password = $user->password;

        if (!$user->roles->first())
        {
            $this->notification(
                'User Not Found',
                'The user ID provided does not have a role.',
                'error'
            );
            return;
        }
        $this->role = $user->roles->first()->name;

    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        // $role = Role::where('id', $this->role)->first();
        // if (!$role) {
        //     $this->notification(
        //         'Role Not Found',
        //         'The role ID provided does not exist.',
        //         'error'
        //     );
        //     return;
        // }

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->user->assignRole($this->role);

        $this->reset(['name', 'email', 'password', 'role']);
        $this->dispatch('closePanel');
        $this->dispatch('user-updated');

        $this->notification(
            'User Updated',
            'The user has been updated successfully.',
            'success'
        );
    }

    public function render()
    {
        return view('livewire.slide-over-edit-user');
    }
}