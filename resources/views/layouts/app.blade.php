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

        <section class="px-8 mb-2">
            <header class="container mx-auto">
                  <h3>
                      <img src="{{ asset('images/logo.png') }}" alt="tweety logo" style="width: 30px;height:30px">
                  </h3>
            </header>
        </section>

       <section class="px-8">
            <main class="container mx-auto">
                <div class="lg:flex lg:justify-between">
                   @auth
                   <div class="w-32">
                       @include('includes._sidebar-links')
                   </div>
                   @endauth
                    <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                      @yield('content')
                    </div>
                    @auth

                    <div class="w-1/6 bg-blue-200 rounded-lg p-4 sticky top-8">
                        @include('includes._friends-list')
                    </div>
                    @endauth

                </div>
            </main>
       </section>
    </div>
</body>
</html>
