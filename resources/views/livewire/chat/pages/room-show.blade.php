<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ ucfirst($room->name) }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-12 gap-6">
        <livewire:chat.users :room="$room" />

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-9">
            <div class="p-6 text-gray-900">
                <livewire:chat.messages :room="$room" />

                <form class="mt-3">

                    <label for="message" class="sr-only">Message</label>

                    <textarea name="message" id="message" rows="4"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                        placeholder="Message..." wire:model="message"
                        x-data="{
                            shift: false,
                            typingTimeout: null,
                            handleTypingFinished() {
                                Echo.private('chat.room.{{ $room->slug }}')
                                    .whisper('not-typing', {
                                        id: {{ auth()->id() }}
                                    })
                        
                                clearTimeout(this.typingTimeout)
                            }
                        }" x-on:keydown.shift="shift = true"
                        x-on:keyup.shift="shift = false"
                        x-on:keydown.enter="if (!shift || !$event.target.value) { $event.preventDefault() }"
                        x-on:keyup.enter.prevent="if (!shift && $event.target.value) { $wire.submit(); handleTypingFinished() }"
                        x-on:keydown="
                            clearTimeout(typingTimeout)

                            Echo.private('chat.room.{{ $room->slug }}')
                                .whisper('typing', {
                                    id: {{ auth()->id() }}
                                })

                            typingTimeout = setTimeout(handleTypingFinished, 3000)
                        "
                        ></textarea>

                </form>
            </div>
        </div>
    </div>
</div>
