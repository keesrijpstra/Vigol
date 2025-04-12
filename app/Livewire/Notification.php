<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $messageType;
    public $title;
    public $message;
    public $show = false;

    public function mount($title, $message, $type = "success")
    {
        switch ($type) {
            case "success":
                $this->messageType = "success";
                break;
            case "warning":
                $this->messageType = "warning";
                break;
            case "error":
                $this->messageType = "error";
                break;
        }

        if (!$title) {
            throw new \InvalidArgumentException("Title cannot be empty");
        }

        if (!$message) {
            throw new \InvalidArgumentException("Message cannot be empty");
        }

        $this->message = $message;
        $this->title = $title;
        $this->show = true;
    }

    public function dismiss()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.notification');
    }
}