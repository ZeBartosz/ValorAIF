@props(['post', 'full' => false])
<div class="static flex flex-wrap box-content p- my-[25px] border-2 rounded-lg drop-shadow-sm"
    style="background-image: url('/storage/{{ $post->postsBanner }}'); background-size: cover; background-position: center; ">
    <div class="max-w-[600px] min-w-[600px] max-">


        {{-- Avatar --}}
        <div class="absolute top-[-12px] left-[10px]">
            <a href="{{ route('posts.user', $post->user) }}"><img class="rounded-full max-h-[50px] border-2 mb-5 "
                    src="/storage\account_images\{{ $post->user->avatar }}" alt=""></a>
        </div>

        {{-- Date and Auther of post --}}
        <div class=" text-white ml-[70px]">
            <p class="h-[20px]" style="text-shadow: 1px 1px black, -1px -1px black;"> Created by: <em><a
                        href="{{ route('posts.user', $post->user)}}">{{ $post->user->username }}</a></em></p>
            <p class="text-xs font-light" style="text-shadow: 1px 1px black, -1px -1px black;">
                {{ $post->created_at->diffForHumans() }} </p>
        </div>


        {{-- Title --}}
        <div class="mx-3 mt-2">
            <h2 class=" text-white drop-shadow-sm " style="text-shadow: 1px 1px black, -1px -1px black;">
                {{ $post->title }}</h2>
        </div>


        {{-- Body --}}
        @if ($full)
            <div class="text-ellipsis text-base text-white mx-3 my-2">
                <span class="break-all " style="text-shadow: 1px 1px black, -1px -1px black;">{{ $post->body }}</span>
            </div>
        @else
            <div class="text-ellipsis text-base text-white mx-3 my-2">
                <span class="break-all "
                    style="text-shadow: 1px 1px black, -1px -1px black;">{{ Str::limit($post->body, 200) }}</span>
                <a href="{{ route('posts.show', $post) }}" class="text-blue-500 ml-1 text-sm">Read more &rarr;</a>
            </div>
        @endif


        <div class="text-white mb-2 mr-2 flex justify-end">
            {{ $slot }}
        </div>
    </div>
</div>
