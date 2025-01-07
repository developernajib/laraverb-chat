<div>
    <button wire:click="$set('open', true)" class="bg-yellow-500 text-white px-4 py-1 rounded-md">{{ __('Edit') }}</button>

    <div x-data="{ open: @entangle('open') }" x-cloak>
        <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" @click="open = false"></div>
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg">
                <form wire:submit.prevent="updateRoom">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold mb-4">{{ __('Edit Room') }}</h2>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Room Name') }}</label>
                            <input type="text" wire:model="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" @click="open = false" class="mr-2 bg-gray-500 text-white px-4 py-2 rounded-md">{{ __('Cancel') }}</button>
                            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md">{{ __('Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
