<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources\js\app.js'])
</head>

<body
    style="background-image: url('/storage/account_images/Logo/valorantBackground.png'); background-size: cover; height: 100vh; background-repeat: no-repeat; background-attachment: fixed;">

    <nav class="bg-[#b3000f] border-b-2 border-white flex justify-evenly">

        <div>
            <a href="{{ route('posts.index') }}"><img class="logo" src="\storage\account_images\Logo\ValorAIF.png"
                    alt=""></a>
        </div>

        <form action=" {{ route('posts.index') }}" method="GET">
            @csrf
            <div class="relative mx-auto ">
                <input class="h-10 px-5 pr-16 focus:outline-none " type="search" name="search" id="search"
                    placeholder="Search">
                <button id="searchSubmit" type="submit" class="absolute right-2 top-0 mt-3 mr-5">
                    <svg class=" h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                        xml:space="preserve" width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </div>
        </form>

        @auth


            <div class="flex ">
                <ul class="flex">
                    <li>
                        @admin
                            <a class="mr-2 text-white" href="{{ route('adminDashboard') }}">Admin</a>
                        @endadmin
                    </li>
                    <li>

                        <a class="mr-2 text-white" href="{{ route('profile') }}">Profile</a>
                    </li>
                    <li>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="text-white" href=""><button class="nav-link">Logout</button></a>
                        </form>
                    </li>
                </ul>
            </div>

        @endauth

        @guest
            <div>
                <a class="mr-2 text-white" href="{{ route('login') }}">Login</a>
                <a class="text-white" href="{{ route('register') }}">Register</a>
            </div>
        @endguest
    </nav>

    <main>
        {{ $slot }}
    </main>

</body>

</html>
