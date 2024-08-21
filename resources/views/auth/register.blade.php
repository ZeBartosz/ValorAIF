<x-layout>

    <h1>Register a new account</h1>

    <div>
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Username --}}
            <div class="m-5">
                <label for="username">Username</label>
                <input type="text" name="username" class="shadow md:shadow-lg ">
            </div>

            {{-- Email --}}
            <div class="m-5">
                <label for="Email">Email</label>
                <input type="text" name="Email" class="shadow md:shadow-lg ">
            </div>

            {{-- Password --}}
            <div class="m-5">
                <label for="password">Password</label>
                <input type="password" name="password" class="shadow md:shadow-lg ">
            </div>
            
            {{-- Password Confirmation --}}
            <div class="m-5">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" class="shadow md:shadow-lg ">
            </div>

            {{-- Avator --}}
            <div class="m-5">
                <label for="avator">Avator</label>
                <input type="file" name="avator">
            </div>
            
            {{-- Avator --}}
            <div class="m-5">
                <label for="banner">Banner</label>
                <input type="file" name="banner">
            </div>

            {{-- Submit --}}
            <button class="btn">register</button>
        </form>
    </div>
</x-layout>