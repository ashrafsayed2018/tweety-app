<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <section class="px-8 mb-2 mt-3">
            <header class="container mx-auto flex justify-between">
                  <h3>
                      <img src="{{ asset('images/logo.png') }}" alt="tweety logo" style="width: 30px;height:30px">
                  </h3>
                  <div class="icons">
                      @if (auth()->check())
                      <div class="notify relative">
                            <div class="w-5 h5 rounded absolute" style="top:-10px;right:20px">
                                @if (auth()->user()->unreadNotifications->count() > 9)
                                <a href="" class="block text-sm w-auto h-auto text-center bg-pink-200 text-pink-800 rounded-full">
                                    9+
                                </a>
                                @elseif(auth()->user()->unreadNotifications->count() < 9 && auth()->user()->unreadNotifications->count() > 0)
                                <a href="{{ route('notifications.show') }}" class="block text-sm w-auto h-auto text-center bg-pink-200 text-pink-800 rounded-full">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </a>
                                @endif

                            </div>
                            <img src="{{ asset('icons/notify.svg') }}" alt="" style="width: 20px;height:20px">
                        </div>
                      @endif

            </header>
        </section>

        {{ $slot }}

    </div>
    <script src="https://unpkg.com/turbolinks@5.2.0/dist/turbolinks.js"></script>
</body>
</html>
