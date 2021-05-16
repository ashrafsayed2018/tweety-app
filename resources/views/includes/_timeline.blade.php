@forelse ($tweets as $tweet)

@include('includes._tweet')


@empty

<div class="p-4">No Tweets Yet </div>

@endforelse
{{ $tweets->links() }}
