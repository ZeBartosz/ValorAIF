<x-layout>
    <div class="flex-wrap">

        <div class="pb-3 border-l-2 border-r-2 border-b-2 bg-gray-800 bg-opacity-75">
            <div class="pt-3 flex justify-center">
                <h1 class=" text-white" style="text-shadow: 1px 1px black, -1px -1px black;">Welcome
                {{ auth()->user()->username }} you have {{ $posts->total() }} posts!</h1>
            </div>
            

            {{-- ~Create post --}}
            <h1 class="pt-3 flex justify-center text-white">Create your post!</h1>
            <div class="flex items-center justify-center">
                <form action="{{ route('postsStore') }}" method="POST" enctype="multipart/form-data">
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
                        <textarea name="body" id="" cols="20" rows="10" class="shadow md:shadow-lg "></textarea>
                        @error('body')
                        <p class="text-red-500">{{ $message }}</p>
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
                    <button class="btn">Create</button>
                </form>
            </div>
        </div>
            
            <div class="flex justify-center ">
                <h2 class="text-white mt-4 text-xl" style="text-shadow: 1px 1px black, -1px -1px black;">Your Posts:</h2>
            </div>
            @foreach ($posts as $post)
            <x-postCards :post="$post">
                <div class="mr-2 border-2 rounded-md bg-green-600">
                    <button class="mx-3" style="text-shadow: 1px 1px black, -1px -1px black;"><a
                            href="{{ Route('posts.edit', $post)}}">edit</a></button>
                </div>

                <div class="border-2 rounded-md bg-red-700">
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <button class="mx-3" style="text-shadow: 1px 1px black, -1px -1px black;">Delete</button>
                    </form>
                </div>
            </x-postCards>
        @endforeach

        <div>
            {{ $posts->links() }}
        </div>
</x-layout>
