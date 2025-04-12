<?php

namespace App\Livewire;

use Livewire\Component;
use App\HasNotifications;
use Livewire\Attributes\On;

class Users extends Component
{
    use HasNotifications;

    public $users;

    public function mount()
    {
        $this->users = \App\Models\User::all();
    }

    #[On('user-created')]
    public function refreshUsers()
    {
        $this->users = \App\Models\User::all();
    }

    #[On('user-updated')]
    public function refreshUser()
    {
        $this->users = \App\Models\User::all();
    }

    public function showEditUserSlideOver($userId)
    {
        if(!$userId) {
            $this->notification(
                'User Not Found',
                'The user ID provided is invalid.',
                'error'
            );
            return;
        }

        $this->dispatch('openPanel', 'Edit User Debug', 'App\Livewire\SlideOver\SlideOverEditUser', ['userId' => $userId]);
    }

    public function showAddUserSlideOver()
    {
        $this->dispatch('openPanel', 'Add User Debug', 'App\Livewire\ShowAddUserSlideOver');
    }
    
    public function render()
    {
        return view('livewire.users');
    }
}
