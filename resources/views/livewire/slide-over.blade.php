{{-- resources/views/livewire/slide-over/slide-over.blade.php --}}
<div class="flex h-full flex-col">
    <div class="bg-indigo-700 px-4 py-6 sm:px-6">
        <div class="flex items-center justify-between">
            <h2 class="text-base font-semibold text-white" id="slide-over-title">New Role</h2>
            <div class="ml-3 flex h-7 items-center">
                <button type="button" 
                    wire:click="$dispatch('closePanel')"
                    class="relative rounded-md bg-indigo-700 text-indigo-200 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden">
                    <span class="absolute -inset-2.5"></span>
                    <span class="sr-only">Close panel</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="flex-1 overflow-y-auto">
        <form class="flex h-full flex-col divide-y divide-gray-200" wire:submit="save">
            <div class="flex flex-1 flex-col justify-between">
                <div class="divide-y divide-gray-200 px-4 sm:px-6">
                    <div class="space-y-6 pt-6 pb-5">
                        <!-- Name input -->
                        <div>
                            <label for="role-name"
                                class="block text-sm/6 font-medium text-gray-900">Name</label>
                            <div class="mt-2">
                                <input type="text" name="role-name" id="role-name"
                                    wire:model.defer="name"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Guard dropdown - FIXED VERSION -->
                        <div>
                            <label id="listbox-label" class="block text-sm/6 font-medium text-gray-900">Guard</label>
                            <div x-data="{ 
                                open: false,
                                selectedGuard: '{{ $guard }}', 
                                selectedLabel: '{{ collect($guards)->firstWhere('value', $guard)['label'] ?? $guard }}',
                                
                                toggle() {
                                    this.open = !this.open;
                                },
                                
                                close() {
                                    this.open = false;
                                },
                                
                                select(value, label) {
                                    this.selectedGuard = value;
                                    this.selectedLabel = label;
                                    this.open = false;
                                    $wire.selectGuard(value);
                                }
                            }" class="relative mt-2">
                                <!-- Dropdown trigger button -->
                                <button type="button"
                                    @click.prevent.stop="toggle()"
                                    class="grid w-full cursor-default grid-cols-1 rounded-md bg-white py-1.5 pr-2 pl-3 text-left text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                    aria-haspopup="listbox" 
                                    :aria-expanded="open"
                                    aria-labelledby="listbox-label">
                                    <span class="col-start-1 row-start-1 truncate pr-6" x-text="selectedLabel"></span>
                                    <svg class="col-start-1 row-start-1 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                        viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"
                                        data-slot="icon">
                                        <path fill-rule="evenodd"
                                            d="M5.22 10.22a.75.75 0 0 1 1.06 0L8 11.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-2.25 2.25a.75.75 0 0 1-1.06 0l-2.25-2.25a.75.75 0 0 1 0-1.06ZM10.78 5.78a.75.75 0 0 1-1.06 0L8 4.06 6.28 5.78a.75.75 0 0 1-1.06-1.06l2.25-2.25a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div x-show="open" 
                                    x-transition
                                    @click.outside="close()"
                                    @keydown.escape.window="close()"
                                    class="absolute z-10 mt-1 w-full">
                                    <ul class="max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base ring-1 shadow-lg ring-black/5 focus:outline-hidden sm:text-sm"
                                        tabindex="-1" role="listbox" aria-labelledby="listbox-label">
                                        
                                        @foreach($guards as $guardOption)
                                            <li @click.prevent.stop="select('{{ $guardOption['value'] }}', '{{ $guardOption['label'] }}')" 
                                                class="relative cursor-default py-2 pr-9 pl-3 hover:bg-indigo-100 select-none"
                                                :class="{ 'bg-indigo-600 text-white hover:bg-indigo-600': selectedGuard === '{{ $guardOption['value'] }}', 'text-gray-900': selectedGuard !== '{{ $guardOption['value'] }}' }"
                                                id="listbox-option-{{ $loop->index }}" 
                                                role="option"
                                                :aria-selected="selectedGuard === '{{ $guardOption['value'] }}'">
                                                
                                                <span class="block truncate" 
                                                      :class="{ 'font-semibold': selectedGuard === '{{ $guardOption['value'] }}', 'font-normal': selectedGuard !== '{{ $guardOption['value'] }}' }">
                                                    {{ $guardOption['label'] }}
                                                </span>

                                                <span class="absolute inset-y-0 right-0 flex items-center pr-4"
                                                      :class="{ 'text-white': selectedGuard === '{{ $guardOption['value'] }}', 'text-indigo-600': selectedGuard !== '{{ $guardOption['value'] }}' }"
                                                      x-show="selectedGuard === '{{ $guardOption['value'] }}'">
                                                    <svg class="size-5" viewBox="0 0 20 20" fill="currentColor"
                                                        aria-hidden="true" data-slot="icon">
                                                        <path fill-rule="evenodd"
                                                            d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @error('guard')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex shrink-0 justify-end px-4 py-4">
                <button type="button" wire:click="$dispatch('closePanel')"
                    class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50">Cancel</button>
                <button type="submit"
                    class="ml-4 inline-flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</div>