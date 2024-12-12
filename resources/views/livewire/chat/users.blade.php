<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-3">
    <div class="p-6 text-gray-900">
        <h2 class="text-lg font-semibold mb-2">Users</h2>

        @foreach ($this->users as $user)
            @php
                $nameParts = explode(' ', $user->name);
                $primaryName =
                    count($nameParts) > 2 ? $nameParts[count($nameParts) - 2] : $nameParts[1] ?? $nameParts[0];
            @endphp
            <div class="flex items-center mb-2 bg-gray-300 p-1 rounded-md">
                <img class="size-6 rounded-lg" src="{{ $user->avatar() }}"></img>
                <div class="ml-3">
                    <div class="font-bold">{{ $primaryName }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
