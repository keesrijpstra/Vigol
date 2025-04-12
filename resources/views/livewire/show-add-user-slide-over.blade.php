<div class="flex flex-col h-full">
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

                        <div>
                            <label for="email"
                                class="block text-sm/6 font-medium text-gray-900">Email</label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email"
                                    wire:model.defer="email"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Password input -->
                        <div>
                            <label for="password"
                                class="block text-sm/6 font-medium text-gray-900">Password</label>
                            <div class="mt-2">
                                <input type="password" name="password" id="password"
                                    wire:model.defer="password"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Password confirmation input -->
                        <div>
                            <label for="password_confirmation"
                                class="block text-sm/6 font-medium text-gray-900">Confirm
                                Password</label>
                            <div class="mt-2">
                                <input type="password" name="password_confirmation"
                                    id="password_confirmation"
                                    wire:model.defer="password_confirmation"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @error('password_confirmation')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Role dropdown -->
                        <div>
                            <label for="role"
                                class="block text-sm/6 font-medium text-gray-900">Role</label>
                            <div class="mt-2">
                                <select id="role" name="role"
                                    wire:model.defer="role"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <option value="">Select a role</option>
                                    @if($roles === null)
                                        <option value="">No roles available</option>
                                    @else
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('role')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- Footer with actions -->
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <div class="flex justify-end gap-x-3">
                        <button type="button" wire:click="$dispatch('closePanel')"
                            class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-gray-300 hover:bg-gray-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Cancel
                        </button>
                        <button type="submit"
                            class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>