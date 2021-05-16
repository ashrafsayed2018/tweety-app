<div class="flex p-4  mb-4 border border-gray-300 rounded-lg">
    <div class="mr-4 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            @if ($tweet->user->avatar)
            <img src="{{ asset('storage/profile_images/' . $tweet->user->avatar) }}" class="rounded-full mr-2" alt="user profile" style="width: 40px;height:40px">
            @else
            <img src="https://i.pravatar.cc/150?u={{ $tweet->user->email }}@pravatar.com" class="rounded-full mr-2" alt="user profile" style="width: 40px;height:40px">
            @endif
        </a>
    </div>
    <div class="mr-4 flex-1">
        <div class="flex w-full justify-between">
            <h5 class="font-bold mb-4">
                <a href="{{ route('profile', $tweet->user) }}">
                    {{ $tweet->user->name }}
                </a>
             </h5>
            <span>{{ $tweet->created_at->diffForHumans() }}</span>
        </div>

        <p class="text-sm mb-3">{{ $tweet->body }}</p>

        <x-likes-buttons :tweet="$tweet" />
    </div>
</div>
