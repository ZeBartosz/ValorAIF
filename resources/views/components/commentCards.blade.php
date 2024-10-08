@props(['comment', 'depth' => 0])

@php
    $boxWidth = max(600 - $depth * 50, 300);
    $post;
@endphp

<div class="mb-3">
    <div class="flex flex-wrap flex-row-reverse ml-{{ $depth * 4 }}">
        <div class="static flex flex-wrap box-content border-2 rounded-lg drop-shadow-sm bg-gray-900 bg-opacity-75"
            style="max-width: {{ $boxWidth }}px; min-width: {{ $boxWidth }}px;">
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
    </div>


    <div class="flex flex-wrap justify-between mt-1 ml-{{ $depth * 4 }} " >
        <div class="flex flex-wrap bg-black bg-opacity-15 rounded-md" >

            <div class="ml-1 my-1 border-r-[1px]">
                <form action="{{ route('commentLikes', $comment) }}" method="POST">
                    @csrf

                    <Button class="btnlike pr-2 pl-1 flex flex-wrap text-white"
                        style="text-shadow: 2px 2px #000000;"><img width="25" class="pr-1" src="{{ asset('storage/svg/like.svg') }}" alt="">{{ $comment->commentLikesCount() }}</Button>
                </form>
            </div>

            <div class="my-1 border-r-[1px]">
                <form action="{{ route('commentDislikes', $comment) }}" Method="POST">
                    @csrf
                    <button class="btnlike pr-2 pl-2 flex flex-wrap text-white"
                        style="text-shadow: 2px 2px #000000;"><img width="25" class="pr-1" src="{{ asset('storage/svg/dislike.svg') }}" alt="">{{ $comment->commentDislikesCount() }}</button>
                </form>
            </div>

        </div>

        <div class="flex flex-row-reverse my-1">
            {{-- edit and delete --}}
            @if ($comment->sameUser($comment->user_id))
                <div class="flex flex-wrap bg-black bg-opacity-15 rounded-md ">
                    <div class="flex my-1">
    
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
            @endif
        </div>
            

    </div>
    {{-- Reply Button --}}
    <div class="text-sm text-blue-500 ml-2 flex flex-wrap flex-row-reverse ml-{{ $depth * 4 }}">
        <button class="reply pr-3" data-comment-id="{{ $comment->id }}">Reply</button>
    
    </div>
</div>



@if ($comment->replies->isNotEmpty())
    @foreach ($comment->replies as $reply)
        <x-commentCards :comment="$reply" :depth="$depth + 1" />
    @endforeach
@endif
