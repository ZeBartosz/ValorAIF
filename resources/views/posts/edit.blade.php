<x-layout>

    <div class="">
        <a href="{{ route('profile') }}" class="block mb-2 text-blue-500">&larr; Go back to your dashboard</a>
        <h2 class="">Update your post!</h2>
        <form action="{{ route('posts.update', $post) }}" method="Post" enctype="multipart/form-data">
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

            {{-- Banner --}}
            <div class="m-5">
                <label for="postsBanner">Banner</label>
                <input type="file" name="postsBanner">
                @error('postsBanner')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button class="btn">Edit</button>
        </form>
    </div>

</x-layout>
