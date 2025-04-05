<div class="relative z-20" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 sm:pl-16" wire:click.outside="$dispatch('close-slide-over')">
                <!-- 
                Slide-over panel, show/hide based on slide-over state.
                -->
                <div x-data 
                     x-init="setTimeout(() => { $el.classList.remove('translate-x-full'); $el.classList.add('translate-x-0'); }, 50)"
                     class="pointer-events-auto w-screen max-w-md transform transition ease-in-out duration-500 sm:duration-700 translate-x-full">
                    <form class="flex h-full flex-col divide-y divide-gray-200 bg-white shadow-xl" wire:submit="save">
                        <div class="h-0 flex-1 overflow-y-auto">
                            <div class="bg-indigo-700 px-4 py-6 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-base font-semibold text-white" id="slide-over-title">New Project</h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" wire:click="$dispatch('close-slide-over')"
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
                                <div class="mt-1">
                                    <p class="text-sm text-indigo-300">Get started by filling in the information below
                                        to create your new project.</p>
                                </div>
                            </div>
                            <div class="flex flex-1 flex-col justify-between">
                                <div class="divide-y divide-gray-200 px-4 sm:px-6">
                                    <div class="space-y-6 pt-6 pb-5">
                                        <div>
                                            <label for="project-name"
                                                class="block text-sm/6 font-medium text-gray-900">Project name</label>
                                            <div class="mt-2">
                                                <input type="text" name="project-name" id="project-name"
                                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="project-description"
                                                class="block text-sm/6 font-medium text-gray-900">Description</label>
                                            <div class="mt-2">
                                                <textarea rows="3" name="project-description" id="project-description"
                                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-sm/6 font-medium text-gray-900">Team Members</h3>
                                            <div class="mt-2">
                                                <div class="flex space-x-2">
                                                    <!-- Team members section -->
                                                    <!-- Omitted for brevity, same as in original -->
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset>
                                            <legend class="text-sm/6 font-medium text-gray-900">Privacy</legend>
                                            <div class="mt-2 space-y-4">
                                                <!-- Privacy radio options -->
                                                <!-- Omitted for brevity, same as in original -->
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="pt-4 pb-6">
                                        <!-- Additional links section -->
                                        <!-- Omitted for brevity, same as in original -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex shrink-0 justify-end px-4 py-4">
                            <button type="button" wire:click="$dispatch('close-slide-over')"
                                class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50">Cancel</button>
                            <button type="submit"
                                class="ml-4 inline-flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>