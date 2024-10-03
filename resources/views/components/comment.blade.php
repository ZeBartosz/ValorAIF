@props(['comment', 'depth' => 0]) 

@php
    $boxWidth = max(600 - $depth * 50, 300); 
    $post
@endphp

<div class="flex flex-wrap flex-row-reverse ml-{{ $depth * 4 }}"> 
    <div class="static flex flex-wrap box-content border-2 rounded-lg drop-shadow-sm bg-gray-700 bg-opacity-25" style="max-width: {{ $boxWidth }}px; min-width: {{ $boxWidth }}px;">
        <div class="text-white">
            <div class="flex m-1">
                <h2 class="ml-2" style="text-shadow: 1px 1px black, -1px -1px black;">
                    <em>
                        <a href="{{ route('posts.user', $comment->user_id) }}">
                            {{ app\Models\User::find($comment->user_id)->username }}
                        </a>
                    </em>
                </h2>
                <div class="ml-2 mt-1 text-xs font-light">
                    <p style="text-shadow: 1px 1px black, -1px -1px black;">
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

{{-- Reply Button --}}
<div class="text-sm text-blue-500 mb-3 flex flex-wrap flex-row-reverse ml-{{ $depth * 4 }}">
    <button class="reply pr-3" data-comment-id="{{ $comment->id }}">Reply</button>
</div>

@if($comment->replies->isNotEmpty())
    @foreach($comment->replies as $reply)
        <x-comment :comment="$reply" :depth="$depth + 1" />
    @endforeach
@endif

