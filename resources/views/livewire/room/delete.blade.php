<div>
    <button wire:click="confirmDelete" class="bg-red-500 text-white px-4 py-1 rounded-md">{{ __('Delete') }}</button>

    <div x-data="{ confirming: @entangle('confirming') }" x-cloak>
        <div x-show="confirming" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" @click="confirming = false"></div>
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg">
                <div class="p-6">
                    <h2 class="text-lg font-semibold mb-4">{{ __('Delete Room') }}</h2>
                    <p>{{ __('Are you sure you want to delete this room? This action cannot be undone.') }}</p>
                    <div class="flex justify-end mt-4">
                        <button type="button" @click="confirming = false" class="mr-2 bg-gray-500 text-white px-4 py-2 rounded-md">{{ __('Cancel') }}</button>
                        <button wire:click="deleteRoom" class="bg-red-500 text-white px-4 py-2 rounded-md">{{ __('Delete') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
