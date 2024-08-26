<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav>
        <a href="{{ route('posts.index') }}">Home</a>
        @auth
        <div>
            <a href="{{ route('profile') }}">Profile</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>Logout</button>
            </form>
        </div>
        @endauth

        @guest
        <div>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
        @endguest
    </nav>

    <main>
        {{ $slot }}
    </main>
</body>
</html>