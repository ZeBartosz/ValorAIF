<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    style="background-image: url('/storage/account_images/Logo/valorantBackground.png'); background-size: cover; height: 100vh; background-repeat: no-repeat; background-attachment: fixed;">

    <!-- Navigation Bar -->
    <nav class="bg-[#b3000f] border-b-2 border-white flex justify-between items-center">

        <!-- Logo (visible on larger screens) -->
        <div class="hidden sm:block">
            <a href="{{ route('posts.index') }}"><img class="logo" src="\storage\account_images\Logo\ValorAIF.png"
                    alt="Logo"></a>
        </div>

        <!-- Search Bar -->
        <form action=" {{ route('posts.index') }}" method="GET" class="max-w-xs sm:max-w-md">
            @csrf
            <div class="relative m-2">
                <input class="h-10 px-5 pr-16 focus:outline-none w-full" type="search" name="search" id="search"
                    placeholder="Search">
                <button id="searchSubmit" type="submit" class="absolute right-2 top-0 mt-3 mr-5">
                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 56.966 56.966" width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </div>
        </form>

        <!-- Hamburger Menu (visible on small screens) -->
        <div class="sm:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <!-- Nav Links (visible on larger screens) -->
        <div class="hidden sm:flex">
            @auth
            <div class="flex items-center space-x-4">
                @admin
                <a class="text-white" href="{{ route('adminDashboard') }}">Admin</a>
                @endadmin
                <a class="text-white" href="{{ route('profile') }}">Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-white">Logout</button>
                </form>
            </div>
            @endauth

            @guest
            <div class="flex space-x-4">
                <a class="text-white" href="{{ route('login') }}">Login</a>
                <a class="text-white" href="{{ route('register') }}">Register</a>
            </div>
            @endguest
        </div>
    </nav>

    <!-- Dropdown Menu (visible on small screens) -->
    <div id="dropdown-menu" class="hidden bg-[#b3000f] sm:hidden">
        <ul class="flex flex-col text-center text-white py-4">
            @auth
            <li class="pb-2"><a href="{{ route('posts.index') }}">Home</a></li>
            @admin
            <li class="py-2"><a href="{{ route('adminDashboard') }}">Admin</a></li>
            @endadmin
            <li class="py-2"><a href="{{ route('profile') }}">Profile</a></li>
            <li class="py-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-white">Logout</button>
                </form>
            </li>
            @endauth

            @guest
            <li class="pb-2"><a href="{{ route('posts.index') }}">Home</a></li>
            <li class="py-2"><a href="{{ route('login') }}">Login</a></li>
            <li class="py-2"><a href="{{ route('register') }}">Register</a></li>
            @endguest
        </ul>
    </div>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <script>
        // Toggle dropdown visibility
        const menuToggle = document.getElementById('menu-toggle');
        const dropdownMenu = document.getElementById('dropdown-menu');

        menuToggle.addEventListener('click', function () {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>

</body>

</html>
