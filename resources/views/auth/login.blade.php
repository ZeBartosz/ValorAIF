<x-layout>

    <main class="h-screen flex items-center justify-center ">

        <div class="border-2 rounded-lg drop-shadow-sm bg-gray-900 bg-opacity-75">

            <div class="m-4">


                <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="text-white flex items-center justify-center">
                        <h1 class="">Login</h1>
                    </div>

                    {{-- Email --}}
                    <div class="m-5">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="shadow md:shadow-lg ">
                        @error('email')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="m-5">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="shadow md:shadow-lg ">
                        @error('password')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <dir>
                        <input type="checkbox" name="remember">
                        <label for="remember">Remember me</label>
                    </dir>

                    @error('failed')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    {{-- Submit --}}
                    <div class="flex justify-center">

                        <button class="btn">Login</button>
                    </div>
                </form>
                <div class="flex justify-center">
                    <a class="mt-1 text-blue-700" href="{{ route('register') }}">Create an account</a>

                </div>
            </div>
        </div>

    </main>
</x-layout>
