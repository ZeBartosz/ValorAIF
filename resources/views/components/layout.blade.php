<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-image: url('/storage/account_images/Logo/valorantBackground.png'); background-size: cover; height: 100vh;">

    <nav class="bg-[#bd3944] border-b-2 border-white">
        <a href="{{ route('posts.index') }}"><img class="logo" src="\storage\account_images\Logo\ValorAIF.png"
                alt=""></a>
        @auth
            <div class="flex">
                <a class="pr-2" href="{{ route('profile') }}">Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button>Logout</button>
                </form>
            </div>
        @endauth

        @guest
            <div>
                <a class="pr-2" href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
        @endguest
    </nav>

    <main>
        {{ $slot }}
    </main>

</body>

</html>
