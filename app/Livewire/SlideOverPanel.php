<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;

class SlideOverPanel extends Component
{
    public bool $open = false;
    public string $title = 'Default Panel';
    public string $component = '';
    public array $params = [];
    
    protected $listeners = [
        'openPanel',
        'closePanel'
    ];
    
    public function render(): View
    {
        return view('livewire.slide-over-panel');
    }
    
    public function openPanel(string $title, string $component, array $params = []): void
    {
        $this->open = true;
        $this->title = $title;
        $this->component = $component;
        $this->params = $params;
    }
    
    public function closePanel(): void
    {
        $this->open = false;
        $this->component = '';
        $this->params = [];
    }
}