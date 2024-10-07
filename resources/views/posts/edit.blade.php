<x-layout>

    <main class="h-screen flex items-center justify-center ">

        <div class="border-2 rounded-lg drop-shadow-sm bg-gray-800 bg-opacity-75">

            <div class="m-4">

                <a href="{{ route('profile') }}" class="mb-2 text-blue-500 flex justify-center">&larr; Go back to your dashboard</a>
                <h2 class="text-white flex justify-center">Update your post!</h2>
                <form action="{{ route('posts.update', $post) }}" method="Post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to edit this post?')">
                    @csrf
                    @method('PUT')
                    
                    {{-- title --}}
                    <div class="m-5">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="shadow md:shadow-lg " value="{{ $post->title }}">
                        @error('title')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- body --}}
                    <div class="m-5">
                        <label for="body">Body</label>
                        <textarea name="body" id="" cols="20" rows="10" class="shadow md:shadow-lg">{{ $post->body }}</textarea>
                        @error('body')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="m-5">
                        <label for="catagory">Catagory</label>
                        <select name="catagory" id="catagory" data-placeholder="Select Catagory" >
                            <option value="General">General</option>
                            <option value="Pro">Pro Play</option>
                            <option value="Gameplay">Gameplay</option>
                            <option value="LFT">LFT</option>
                            <option value="Memes">Memes</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    {{-- Banner --}}
                    <div class="m-5">
                        <label for="postsBanner">Banner</label>
                        <input type="file" name="postsBanner">
                        @error('postsBanner')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Submit --}}
                    <button class="btn ">Edit</button>
                </form>
            </div>
        </div>

    </main>
</x-layout>
