<x-layout>
    <main class="h-screen flex items-center justify-center ">

        <div class="border-2 rounded-lg drop-shadow-sm bg-gray-900 bg-opacity-75">
            <div class="m-4">

                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-white flex justify-center">Register a new account</h1>
                    {{-- Username --}}
                    <div class="m-5">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="shadow md:shadow-lg ">
                        @error('username')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="m-5">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="shadow md:shadow-lg ">
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="m-5">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="shadow md:shadow-lg ">
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password Confirmation --}}
                    <div class="m-5">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation"
                            class="shadow md:shadow-lg @error('password') @enderror">
                    </div>

                    {{-- avatar --}}
                    <div class="m-5">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar">
                        @error('avatar')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Banner --}}
                    <div class="m-5">
                        <label for="banner">Banner</label>
                        <input type="file" name="banner">
                        @error('banner')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button class="btn">register</button>
                </form>
            </div>
        </div>
    </main>
</x-layout>
