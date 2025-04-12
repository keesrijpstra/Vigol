<?php

namespace App\Livewire;

use Livewire\Component;

class NotificationManager extends Component
{
    protected $listeners = ['showNotification'];
    
    public $notifications = [];
    
    public function showNotification($data)
    {
        $id = uniqid();
        $this->notifications[$id] = [
            'id' => $id,
            'title' => $data['title'],
            'message' => $data['message'],
            'type' => $data['type'],
            'show' => true,
        ];
    }
    
    public function removeNotification($id)
    {
        if (isset($this->notifications) && is_array($this->notifications) && array_key_exists($id, $this->notifications)) {
            unset($this->notifications[$id]);
        }
    }
    
    public function render()
    {
        return view('livewire.notification-manager');
    }
}