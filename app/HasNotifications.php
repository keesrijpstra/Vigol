<?php

namespace App;

trait HasNotifications
{
    protected function notification($title, $message, $type = 'success')
    {
        $this->dispatch('showNotification', [
            'title' => $title,
            'message' => $message,
            'type' => $type
        ]);
    }
}