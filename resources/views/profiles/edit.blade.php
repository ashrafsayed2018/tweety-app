<x-myapp>
  <form action="{{ $user->profilePath() }}" method="POST" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="mb-6">
        <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">name</label>
        <input
        type="text"
        name="name"
        id="name"
        class="border border-gray-400 p-2 w-full"
        value="{{ $user->name }}"
        required>

        @error('name')
            <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-6">
        <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
        <input
        type="text"
        name="username"
        id="username"
        class="border border-gray-400 p-2 w-full"
        value="{{ $user->username }}"
        required>

        @error('username')
            <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
        @enderror
    </div>


    <div class="mb-6">
        <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">User Image</label>
         <div class="flex">
            <input
            type="file"
            name="avatar"
            id="avatar"
            class="border border-gray-400 p-2 w-full"
            >
            <img src="{{ asset('storage/profile_images/'. $user->avatar) }}" alt="profile image" width="40">
         </div>

        @error('username')
            <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-6">
        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">email</label>
        <input
        type="text"
        name="email"
        id="email"
        class="border border-gray-400 p-2 w-full"
        value="{{ $user->email }}"
        >

        @error('email')
            <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-6">
        <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">password</label>
        <input
        type="text"
        name="password"
        id="password"
        class="border border-gray-400 p-2 w-full"
        >

        @error('password')
            <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password confirmation</label>
        <input
        type="text"
        name="password.confirmation"
        id="password_confirmation"
        class="border border-gray-400 p-2 w-full"
        >

        @error('password.confirmation')
            <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-6">
        <input
        type="submit"
        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
        <a href="{{ route('profile',$user) }}" class="no-underline bg-red-400 text-white py-2 px-3 hover:bg-red-500">Cancel</a>
    </div>
  </form>
</x-myapp>

