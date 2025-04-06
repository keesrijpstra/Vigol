<div class="flex flex-col h-full">
    <!-- Simplified header - you can customize or remove elements as needed -->
    <div class="bg-indigo-700 px-4 py-9 sm:px-6">
        <div class="flex items-center justify-between">
            <h2 class="text-base font-semibold text-white" id="slide-over-title">Edit user</h2>
            <button type="button" 
                wire:click="$dispatch('closePanel')"
                class="rounded-md bg-indigo-700 text-indigo-200 hover:text-white">
                <span class="sr-only">Close panel</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Content area with defined height and overflow -->
    <div class="flex-1 overflow-y-auto">
        <form class="flex h-full flex-col" wire:submit="save">
            <div class="flex-1 px-4 sm:px-6">
                <div class="flex flex-col py-8">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900">
                            Name
                        </label>
                        <div class="mt-2">
                            <input type="text" name="name" id="name"
                                wire:model.defer="name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="email" class="block text-sm font-medium text-gray-900">
                            Email
                        </label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email"
                                wire:model.defer="email"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="password">
                            Password
                        </label>
                        <div class="mt-2">
                            <input type="password" name="password" id="password"
                                wire:model.defer="password"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="role" class="block text-sm font-medium text-gray-900">
                            Role
                        </label>
                        <div class="mt-2">
                            <select id="role" name="role"
                                wire:model.defer="role"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="">Select a role</option>
                                @if($roles === null)
                                    <option value="">No roles available</option>
                                @else
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            
            <!-- Footer with actions -->
            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                <div class="flex justify-end gap-x-3">
                    <button type="button" 
                        wire:click="$dispatch('closePanel')"
                        class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>