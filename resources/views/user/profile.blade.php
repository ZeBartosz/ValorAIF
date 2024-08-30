<x-layout>
    <main class="">
        <div class="flex-wrap">

            <div class="pb-5 ">
                <p>Hello {{ auth()->user()->username }}</p>
                {{-- <img src="{{ auth()->user()->avatar }}" alt="">
                <img class="object-cover h-48 w-96" src="{{ auth()->user()->banner }}" alt=""> --}}
            </div>
            
            <h1 class="flex justify-center">Create your post!</h1>
            <div class="flex items-center justify-center">
                <form action="{{ route('postsStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- title --}}
                    <div class="m-5">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="shadow md:shadow-lg ">
                        @error('title')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- body --}}
                    <div class="m-5">
                        <label for="body">Body</label>
                        <textarea name="body" id="" cols="30" rows="10" class="shadow md:shadow-lg "></textarea>
                        @error('body')
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
                    <button class="btn">Create</button>
                </form>
            </div>
                
                
                
            
    </main>
</x-layout>