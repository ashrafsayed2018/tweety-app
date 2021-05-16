<div class="border border-blue-400 rounded-lg px-8 py-4 mb-8">
    <form action="/tweets" method="POST">
        @csrf
        <textarea
        name="body"
        class="w-full pl-3 pt-4 focus:outline-none focus:ring focus:border-blue-300"
        placeholder="let's up talk ?"
        style="resize: none;height: 130px;"
        autofocus
        ></textarea>
        <hr class="my-4">
        <footer class="flex justify-between items-center">

            @if (auth()->user()->avatar)
            <img src="{{ asset('storage/profile_images/' . auth()->user()->avatar) }}" class="rounded-full mr-2" alt="user profile" style="width: 40px;height:40px">
            @else
            <img src="https://i.pravatar.cc/150?u={{ auth()->user()->email }}@pravatar.com" class="rounded-full mr-2" alt="user profile" style="width: 40px;height:40px">
            @endif            <button
            type="submit"
            class="bg-blue-500 hover:bg-blue-400 rounded-lg shadow p-2 text-white focus:outline-none">
                Tweet You'r Post
            </button>

        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
