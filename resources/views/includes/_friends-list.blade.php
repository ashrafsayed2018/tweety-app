    <h3 class="font-bold text-xl mb-4">Following</h3>
    <ul>

        @forelse (auth()->user()->follows as $user)
            <li class="block {{ $loop->last ? '' : 'my-6' }}" >
                <div>
                    <a href="{{ route('profile', $user->username) }}" class="flex center text-sm">

                    @if ($user->avatar)
                    <img src="{{ asset('storage/profile_images/' . $user->avatar) }}" class="rounded-full mr-2" alt="user profile" style="width: 30px;height:30px">
                    @else
                    <img src="https://i.pravatar.cc/150?u={{ $user->email }}@pravatar.com" class="rounded-full mr-2" alt="user profile" style="width: 30px;height:30px">
                    @endif

                    {{ $user->name }}
                    </a>
                </div>
            </li>

            @empty
            <li>No friends yet </li>
        @endforelse
    </ul>

