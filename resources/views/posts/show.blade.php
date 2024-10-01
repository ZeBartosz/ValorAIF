<x-layout>
    <div>

        <x-postCards :post="$post" full />
        <div
            class="static flex flex-wrap box-content my-[25px] border-2 rounded-lg drop-shadow-sm bg-gray-800 bg-opacity-75">
            <div class="m-3">
                <form action="{{ route('commentStore', $post) }}" method="Post">
                    @csrf

                    {{-- body --}}
                    <div class="m-3">
                        <label for="body">Reply to the post</label>
                        <textarea name="body" id="" cols="70" rows="2" class="shadow md:shadow-lg"></textarea>
                        @error('body')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                    <button class="btn">Reply</button>
                </form>
            </div>
        </div>

        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif

        @foreach ($post->comments as $comment)
            <x-commentCards :comment="$comment" />

            {{-- reply --}}
            <div class="text-sm text-blue-500 mb-3 flex flex-wrap flex-row-reverse ">
                <button class="reply pr-3" data-comment-id="{{ $comment->id }}">Reply</button>
            </div>
        @endforeach

        <script>
            const posts = @json($post->id);  // Blade variable passed to JS
    
            const replyButtons = document.querySelectorAll('.reply');
            
            replyButtons.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();  // Prevent default behavior of the link
    
                    // Get the comment ID from data attribute
                    const comment = item.getAttribute('data-comment-id');
    
                    item.parentElement.insertAdjacentHTML('beforeend', `
                        <div class="static flex flex-wrap box-content my-[25px] border-2 rounded-lg drop-shadow-sm bg-gray-800 bg-opacity-75 p-3 max-w-[500px] min-w-[500px]">
                            <form action="/comments/${posts}/${comment}/store" method="POST">
                                @csrf
                                <div class="m-3">
                                    <label for="body">Reply to the comment</label>
                                    <textarea name="body" cols="70" rows="2" class="shadow md:shadow-lg"></textarea>
                                    @error('body')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button class="btn text-black">Reply</button>
                            </form>
                        </div>
                    `);

                    item.remove();
                });
            });
        </script>


    </div>
</x-layout>
