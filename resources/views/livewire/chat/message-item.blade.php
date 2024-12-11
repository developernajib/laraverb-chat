<div class="flex space-x-3">
    <img class="size-12 rounded-lg" src="{{ $message->user->avatar() }}"></img>
    <div>
        <div class="flex items-baseline space-x-2">
            <div class="font-bold">{{ $message->user->name }}</div>
            <span class="text-gray-600 text-xs">{{ $message->created_at }}</span>
        </div>
        <p>{{ $message->message }}</p>
    </div>
</div>
