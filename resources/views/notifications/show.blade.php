<x-myapp>
  <div class="container">
      <h3>show all notifications for the user </h3>
      <ul>


          @foreach ($notifications as $notification)
              <li class="flex">

                  @if ($notification->type == 'App\Notifications\NewLikeAdded')
                     your tweet {{ $notification->data['tweet']['body'] }} is liked since {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}

                    @elseif($notification->type == 'App\Notifications\NewFollower')

                   <a href="{{ route('profile', $notification->data['follower']['username']) }}">

                        @if ($notification->data['follower']['avatar'])

                        <img src="{{ asset('storage/profile_images/' . $notification->data['follower']['avatar']) }}" class="rounded-full mr-2 " alt="profile image" style="width: 30px;">
                        @else
                        <img src="https://i.pravatar.cc/150?u={{ $notification->data['follower']['email'] }}@pravatar.com" class="rounded-full mr-2" alt="profile image" style="width: 30px;">

                        @endif


                     {{ $notification->data['follower']['name'] }}
                    </a>
                    <span> started to follow you since {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }} </span>
                  @endif

                </li>
          @endforeach
      </ul>
  </div>
</x-myapp>
