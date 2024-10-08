@props(['comment'])


{{-- comment --}}
<div class="flex flex-col flex-wrap-reverse mb-3">
    <div class="flex box-content border-2 rounded-lg drop-shadow-sm bg-gray-900 bg-opacity-75 w-full">
        <div class="text-white">
            <div class="flex m-1">
                <h2 class="ml-2" style="">
                    <em>
                        <a href="{{ route('posts.user', $comment->user_id) }}" style="text-shadow: 1px 1px black">
                            {{ $comment->findUser($comment->user_id)->username }}
                        </a>
                    </em>
                </h2>
                <div class="ml-2 mt-1 text-xs font-light">
                    <p style="text-shadow: 1px 1px black">
                        {{ $comment->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>

            {{-- Body --}}
            <div class="m-3">
                <p>{{ $comment->body }}</p>
            </div>
        </div>
    </div>



    <div class=" flex justify-between mt-1 ">
        {{-- likes and dislikes --}}
        <div class="flex items-center bg-black bg-opacity-15 rounded-md py-1">

            <div class="ml-1 border-r-[1px] ">
                <form action="{{ route('commentLikes', $comment) }}" method="POST">
                    @csrf

                    <Button class="btnlike pr-2 pl-1 flex text-white" style="text-shadow: 2px 2px #000000;"><img
                            width="25" class="pr-1" src="{{ asset('storage/svg/like.svg') }}"
                            alt="">{{ $comment->commentLikesCount() }}</Button>
                </form>
            </div>

            <div class="">
                <form action="{{ route('commentDislikes', $comment) }}" Method="POST">
                    @csrf
                    <button class="btnlike pr-2 pl-2 flex text-white" style="text-shadow: 2px 2px #000000;"><img
                            width="25" class="pr-1" src="{{ asset('storage/svg/dislike.svg') }}"
                            alt="">{{ $comment->commentDislikesCount() }}</button>
                </form>
            </div>

        </div>

        {{-- edit and delete --}}
        @if ($comment->sameUser($comment->user_id))
            <div class="flex">
                {{-- edit and delete --}}
                <div class="flex flex-wrap bg-black bg-opacity-15 rounded-md ">
                    <div class="flex py-1">

                        <div class=" text-green-600 border-r">
                            <button class="mx-2"><a href="{{ route('comments.edit', $comment) }}">edit</a></button>
                        </div>

                        <div class="text-[#b3000f]">
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this reply?')">

                                @csrf
                                @method('DELETE')
                                <button class="mx-2">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>
    {{-- Reply Button --}}
    <div class="text-sm text-blue-500 ml-2 flex flex-wrap flex-row-reverse">
        <button class="reply pr-3" data-comment-id="{{ $comment->id }}">Reply</button>

    </div>
</div>

@if ($comment->replies->isNotEmpty())
    @foreach ($comment->replies as $reply)
        <div id="dynamic-div" class="dynamic-div min-w-[225px] ">
            <x-commentCards :comment="$reply" />
        </div>
    @endforeach
@endif

<script>
    // Select all div elements with the class 'dynamic-div'
    const divs = document.querySelectorAll('.dynamic-div');
  
    // Function to check and apply/remove ml-4 for each div
    function updateMargin() {
      divs.forEach(div => {
        if (div.offsetWidth > 225) {
          div.classList.add('ml-4');
        } else {
          div.classList.remove('ml-4');
        }
      });
    }
  
    // Run the function on initial load
    updateMargin();
  
    // Optional: Run the function on window resize to handle dynamic resizing
    window.addEventListener('resize', updateMargin);
  </script>