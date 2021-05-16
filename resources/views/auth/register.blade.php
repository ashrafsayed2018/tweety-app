<x-master>

@section('content')
<div class="container flex mx-auto justify-center">
    <div class="px-12 py-4 bg-gray-200 border border-gray-300 rounded-lg">
        <div class="col-md-8">
                <div class="font-bold text-lg text-center mb-4">{{ __('Register') }}</div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">username</label>
                            <input type="text" id="username" name="username" class="border border-gray-400 p-2 w-full" autocomplete="on" value="{{ old('username') }}">
                            @error('username')
                            <span class="block text-red-600 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">name</label>
                            <input type="text" id="name" name="name" class="border border-gray-400 p-2 w-full" autocomplete="on" value="{{ old('name') }}">
                            @error('name')
                            <span class="block text-red-600 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="border border-gray-400 p-2 w-full" autocomplete="on" value="{{ old('email') }}">
                            @error('email')
                            <span class="block text-red-600 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">password</label>
                            <input type="password" id="password" name="password" class="border border-gray-400 p-2 w-full" autocomplete="on" value="{{ old('password') }}">
                            @error('password')
                            <span class="block text-red-600 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">password confirm</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="border border-gray-400 p-2 w-full" autocomplete="on" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                            <span class="block text-red-600 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="px-6 py-4 rounded text-sm bg-blue-400 uppercase text-center text-white">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

            </div>
    </div>
</div>
</x-master>
