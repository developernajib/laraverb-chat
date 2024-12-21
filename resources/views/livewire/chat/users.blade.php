<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-3">
    <div class="p-6 text-gray-900">
        <h2 class="text-lg font-semibold mb-2">Users</h2>

        @foreach ($this->users as $user)
            @php
                $nameParts = explode(' ', $user->name);
                $primaryName =
                    count($nameParts) > 2 ? $nameParts[count($nameParts) - 2] : $nameParts[1] ?? $nameParts[0];
            @endphp
            <div class="flex items-center mb-2 bg-gray-300 p-1 rounded-md sm:justify-between justify-center">
                <div class="flex items-center">
                    <img
                        class="size-6 rounded-lg"
                        src="{{ $user->avatar() }}"
                        alt="{{ $user->name }}"
                        title="{{ $primaryName }}"
                    />
                    <div class="ml-3 hidden sm:block font-bold w-full">
                        <span>{{ $primaryName }}</span>
                    </div>
                </div>

                <svg @class(['size-4 animate-bounce transition-opacity opacity-0', 'opacity-100' => in_array($user->id, $typingIds)])" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </div>
        @endforeach
    </div>
</div>
