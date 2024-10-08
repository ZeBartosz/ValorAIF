<x-layout>
    <div class="min-[350px]:max-w-[350px] min-[350px]:min-w-[350px] md:max-w-[600px] md:min-w-[600px] sm:min-w-[600px] sm:max-w-[600px] max-w-[300px] min-w-[300px] mx-auto">

        <div class="pb-3 border-l-2 border-r-2 border-b-2 rounded-b-md bg-gray-900 bg-opacity-75">
            <div class="pt-3 flex justify-center">
                <h1 class="text-center" style="text-shadow: 1px 1px black, -1px -1px black;">Welcome
                    {{ auth()->user()->username }} you have {{ $posts->total() }} posts!</h1>
            </div>
            @if (session('success'))
                <x-flashMsg msg="{{ session('success') }}" />
            @elseif (session('delete'))
                <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
            @endif
            {{-- ~Create post --}}
            <h2 class="pt-3 flex justify-center text-white">Create your post!</h1>
                <div class="flex items-center justify-center">
                    <form action="{{ route('postsStore') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-md">
                        @csrf
                        {{-- title --}}
                        <div class="m-5">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="shadow md:shadow-lg ">
                            @error('title')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- body --}}
                        <div class="m-5">
                            <label for="body">Body</label>
                            <textarea name="body" id="" cols="20" rows="5" class="shadow md:shadow-lg"></textarea>
                            @error('body')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Category --}}
                        <div class="m-5">
                            <label for="catagory">Catagory</label>
                            <select name="catagory" id="catagory" data-placeholder="Select Catagory">
                                <option value="General">General</option>
                                <option value="Pro">Pro Play</option>
                                <option value="Gameplay">Gameplay</option>
                                <option value="LFT">LFT</option>
                                <option value="Memes">Memes</option>
                                <option value="Other">Other</option>
                            </select>
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
                        <div class="flex justify-center">
                            <button class="btn ">Create</button>

                        </div>
                    </form>
                </div>
        </div>

        <div class="flex justify-center ">
            <h2 class="text-white mt-4 text-xl" style="text-shadow: 1px 1px black, -1px -1px black;">Your Posts:</h2>
        </div>
        @foreach ($posts as $post)
            <x-postCards :post="$post" profile/>
        @endforeach

        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
