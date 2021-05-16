@unless (auth()->user()->is($user))
<form action="{{ route('follow', $user->username) }}" method="POST">
    @csrf


   <button type="submit" class="bg-blue-500 hover:bg-blue-400 rounded-lg shadow p-3 text-white text-xs focus:outline-none">
       {{ auth()->user()->isFollowing($user) ? "Unfollow me" : "Follow me" }}
   </button>

</form>
@endunless


