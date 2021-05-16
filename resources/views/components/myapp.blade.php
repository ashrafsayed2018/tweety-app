<x-master>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">

                @auth
                <div class="w-32">
                @include('includes._sidebar-links')
                </div>
                @endauth

                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                    {{ $slot }}
                </div>

                @auth
                <div class="w-1/6 bg-blue-200 border border-gray-300 rounded-lg p-4 sticky top-8">

                    @include('includes._friends-list')
                </div>
                @endauth

            </div>
        </main>
       </section>
</x-master>
