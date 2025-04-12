{{-- resources/views/livewire/slide-over-panel.blade.php --}}
<div x-data="{ open: @entangle('open').live }" class="relative z-90"
    @keydown.window.escape="$wire.closePanel()"
    class="relative z-20">
    
    {{-- Panel --}}
    <div x-show="open"
        x-cloak
        @click.away="$wire.closePanel()"
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed inset-y-0 right-0 max-w-md w-screen bg-white shadow-xl overflow-y-auto pointer-events-auto">
        
        @if($component)
            @livewire($component, $params, key('slide-panel-' . $component))
        @else
            <div class="flex items-center justify-center h-full p-6 text-gray-500">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No component loaded</h3>
                    <p class="mt-1 text-sm text-gray-500">Use the openPanel event to display a component here.</p>
                </div>
            </div>
        @endif
    </div>
</div>