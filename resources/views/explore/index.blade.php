<x-myapp>
  <div>
 @foreach ($users as $user)

    <a href="{{ route('profile', $user->username) }}" class="justify-between flex mb-2">
        <div class="flex">
        @if ($user->avatar)

            <img src="{{ asset('storage/profile_images/'. $user->avatar )}}" class="rounded" alt="{{ $user->username }}" width="60">
            @else
            <img src="https://i.pravatar.cc/150?u={{ $user->email }}@pravatar.com" class="rounded" alt="{{ $user->username }}" width="60">
            @endif
            <div class="ml-8"> {{ '@' .$user->username }}</div>
        </div>
         <x-follow-button :user="$user"></x-follow-button>
    </a>


 @endforeach
  </div>
{!! $users->links() !!}
</x-myapp>
