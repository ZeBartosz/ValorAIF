@php
    $categoryColors = [
        'Other' => 'bg-gray-500',
        'General' => 'bg-red-500',
        'Pro' => 'bg-[#FFD700]',
        'Gameplay' => 'bg-green-500',
        'LFT' => 'bg-teal-400',
        'Memes' => 'bg-indigo-500',
    ];
@endphp
@props(['post', 'full' => false])

<div class="static flex flex-wrap box-content p- my-[25px] border-2 rounded-lg drop-shadow-sm"
    style="background-image: url('/storage/{{ $post->postsBanner }}'); background-size: cover; background-position: center; ">
    <div class="max-w-[600px] min-w-[600px]">


        {{-- Avatar --}}
        <div class="absolute top-[-12px] left-[10px]">
            <a href="{{ route('posts.user', $post->user) }}"><img class="rounded-full max-h-[50px] border-2 mb-5 "
                    src="\storage\{{ $post->user->avatar }}" alt=""></a>
        </div>


        {{-- Date and Auther of post --}}
        <div class=" text-white ml-[70px]">
            <p class="h-[20px]" style="text-shadow: 1px 1px black, -1px -1px black;"><em><a
                        href="{{ route('posts.user', $post->user) }}">{{ $post->user->username }}</a></em></p>
            <p class="text-xs font-light" style="text-shadow: 1px 1px black, -1px -1px black;">
                {{ $post->created_at->diffForHumans() }} </p>
        </div>

        {{-- Catagory --}}
        <div class="text-white absolute top-[4px] right-[4px] {{ $categoryColors[$post->catagory] }} border-2 rounded-md bg-opacity-80">
            <h3 class="mx-2">{{ $post->catagory }}</h3>
        </div>

        {{-- Title --}}
        <div class="mx-3 mt-2">
            <h2 class=" text-white drop-shadow-sm " style="text-shadow: 1px 1px black, -1px -1px black;">
                {{ $post->title }}</h2>
        </div>


        {{-- Body --}}
        @if ($full)
            <div class="text-ellipsis text-base text-white mx-3 my-2">
                <span class="break-all "
                    style="text-shadow: 1px 1px black, -1px -1px black;">{{ $post->body }}</span>
            </div>
        @else
            <div class="text-ellipsis text-base text-white mx-3 my-2">
                <span class="break-all "
                    style="text-shadow: 1px 1px black, -1px -1px black;">{{ Str::limit($post->body, 50) }}</span>
                <a href="{{ route('posts.show', $post) }}" class="text-blue-500 ml-1 text-sm">Read more &rarr;</a>
            </div>
        @endif


        <div class="text-white mb-2 mr-2 flex justify-end">
            {{ $slot }}
        </div>
    </div>
</div>
