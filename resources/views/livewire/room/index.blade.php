<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Rooms') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end items-center mb-2">
            @auth
                @livewire('room.create')
            @endauth
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Room Name') }}</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Slug') }}</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Created At') }}</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($rooms as $room)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('chat.show', $room->slug) }}" class="text-blue-500 hover:underline">{{ ucfirst($room->name) }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $room->slug }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $room->created_at }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap flex space-x-3">
                            @livewire('room.edit', ['roomId' => $room->id], key('edit-' . $room->id))
                            @livewire('room.delete', ['roomId' => $room->id], key('delete-' . $room->id))
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>