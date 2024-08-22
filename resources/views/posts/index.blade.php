<x-layout>

    @auth
        <h1>Logged in</h1>
    @endauth

    @guest
        <h1>This is index page</h1>
    @endguest
</x-layout>