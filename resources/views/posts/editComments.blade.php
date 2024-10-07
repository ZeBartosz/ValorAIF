<x-layout>
    <div class="static flex flex-wrap box-content my-[25px] border-2 rounded-lg drop-shadow-sm bg-gray-800 bg-opacity-75 p-3 max-w-[500px] min-w-[500px]">
        <form action="{{ route('comments.update', $comment)}}" method="POST" onsubmit="return confirm('Are you sure you want to edit this reply?')">
            @csrf
            @method('PUT')
            <div class="m-3">
                <label for="body">Edit the reply</label>
                <textarea name="body" cols="70" rows="2" class="shadow md:shadow-lg" >{{ $comment->body }}</textarea>
                @error('body')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn text-black">Edit Reply</button>
        </form>
    </div>
</x-layout>