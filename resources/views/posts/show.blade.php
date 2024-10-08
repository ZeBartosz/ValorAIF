<x-layout>
    <div class="min-[350px]:max-w-[350px] min-[350px]:min-w-[350px] md:max-w-[600px] md:min-w-[600px] sm:min-w-[600px] sm:max-w-[600px] max-w-[300px] min-w-[300px] ">

        <x-postCards :post="$post" full />
        <div
            class="static flex flex-wrap box-content my-[25px] border-2 rounded-lg drop-shadow-sm bg-gray-900 bg-opacity-75">
            <div class="m-3 w-full">
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

        {{-- Display Parent Comments --}}
        @foreach ($post->comments->where('parent_id', null) as $comment)
            <x-commentCards :comment="$comment" />
        @endforeach

        <script>
            const posts = @json($post->id); // Blade variable passed to JS

            const replyButtons = document.querySelectorAll('.reply');

            replyButtons.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault(); // Prevent default behavior of the link

                    // Get the comment ID from data attribute
                    const comment = item.getAttribute('data-comment-id');

                    item.parentElement.insertAdjacentHTML('beforeend', `
                        <div class="static flex flex-wrap mb-[10px] mt-[2px] border-2 rounded-lg drop-shadow-sm bg-gray-900 bg-opacity-75 p-3 min-[350px]:max-w-[350px] min-[350px]:min-w-[350px] md:max-w-[600px] md:min-w-[600px] max-w-[300px] min-w-[300px]">
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
