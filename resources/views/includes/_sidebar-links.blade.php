<ul>
    <li>
        <a href="{{ route('home') }}" class="font-bold text-lg mb-4  mt-4 block">Home</a>
    </li>
    <li>
        <a href="{{ route('explore') }}" class="font-bold text-lg mb-4 block">Explore</a>
    </li>
    <li>
        <a href="{{ route('notifications.show') }}" class="font-bold text-lg mb-4 block">Notifications </a>
    </li>
    <li>
        <a href="#" class="font-bold text-lg mb-4 block">Messages</a>
    </li>
    <li>
        <a href="#" class="font-bold text-lg mb-4 block">Bookmarks</a>
    </li>
    <li>
        <a href="#" class="font-bold text-lg mb-4 block">Lists</a>
    </li>
        <li>
            <a href="{{ route('profile', auth()->user()) }}" class="font-bold text-lg mb-4 block">Profile</a>
        </li>

    <li>
        <form action="/logout" method="POST">
            @csrf
            <button class="font-bold text-lg block">Logout</button>
        </form>
    </li>
</ul>
