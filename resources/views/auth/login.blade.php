<x-master>

@section('content')
<div class="container flex mx-auto justify-center">
    <div class="px-12 py-4 bg-gray-200 border border-gray-300 rounded-lg">
        <div class="col-md-8">

                <div class="text-center font-bold">{{ __('Login') }}</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                       <div class="mb-6">
                           <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                           <input type="text" id="email" name="email" class="border border-gray-400 p-2 w-full" autocomplete="on" value="{{ old('email') }}">
                           @error('email')
                           <span class="block text-red-600 mt-2" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                       </div>

                       <div class="mb-6">
                        <label for="passowrd" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                        <input type="password" id="passowrd" name="password" class="border border-gray-400 p-2 w-full" autocomplete="current-password" value="{{ old('passowrd') }}">
                        @error('passowrd')
                        <span class="block text-red-600 mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

                        <div class="mb-6">
                            <input type="checkbox" name="remember" id="remember" class="mr-1">
                            <label for="remember" id="remember" class="text-xs text-gray-700 font-bold uppercase" {{ old('remember') ? 'checked': ''}}>Remember me </label>
                        </div>

                        <div>
                            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2">Log In</button>
                            <a href="{{ route('password.request') }}">Forget Your Password</a>
                        </div>
                    </form>
        </div>
    </div>
</div>
</x-master>
