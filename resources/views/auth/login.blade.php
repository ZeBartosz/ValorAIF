<x-layout>

    <h1>Login</h1>

    <div>
        <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
            @csrf

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

            <dir>
                <input type="checkbox" name="remember">
                <label for="remember">Remember me</label>
            </dir>

            @error('failed')
                <p>{{ $message }}</p>
            @enderror

            {{-- Submit --}}
            <button class="btn">Login</button>
        </form>
    </div>
</x-layout>