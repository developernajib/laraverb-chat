<div class="h-64 overflow-y-scroll border border-gray-200 rounded-lg px-4 py-3">
    <div class="space-y-4 pb-4 sm:[overflow-anchor:none]">
        @foreach ($messages as $message)
            <livewire:chat.message-item :message="$message" :key="$message->id" />
        @endforeach
    </div>

    <div class="sm:[overflow-anchor:auto] h-px" x-init="$el.scrollIntoView()">

    </div>
</div>
