@extends('layouts.app')

@section('content')

  <header class="mb-6 relative">
      <div class="relative">
          <img src="{{ asset('images/default.jpg') }}" alt="default image" class="mb-2">
          @if ($user->avatar)

          <img src="{{ asset('storage/profile_images/' . $user->avatar) }}" class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" alt="profile image" style="width: 150px;left: 50%">
          @else
          <img src="https://i.pravatar.cc/150?u={{ $user->email }}@pravatar.com" class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" alt="profile image" style="width: 150px;left: 50%">

          @endif
      </div>

      <div class="flex justify-between items-center mb-14">
          <div style="max-width: 270px">
              <h2 class="font-sm text-2xl">{{ $user->name }}</h2>
              <p class="text-sm">join {{ $user->created_at->diffForHumans() }}</p>
          </div>
          <div class="flex">
            @if (auth()->user()->is($user))
             <a href="{{ $user->profilePath('edit') }}" class="rounded-full border border-gray-300 p-3 text-black text-xs focus:outline-none">Edit Profile</a>
             @endif
            <x-follow-button :user="$user"></x-follow-button>
          </div>
      </div>

      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At ipsam ullam laboriosam unde, iure optio sunt nemo illum nisi quisquam ipsa, non deserunt accusamus veniam. Sed inventore dolorem eos explicabo cupiditate rerum aperiam nisi laudantium aspernatur doloremque recusandae cumque, accusamus reiciendis nihil, consequuntur fugiat neque officia quaerat ab? Est, nihil?</p>

  </header>
    @include('includes._timeline')
@endsection
