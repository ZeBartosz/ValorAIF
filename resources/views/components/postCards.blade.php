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


<div>

    <div class="relative flex flex-wrap box-content p- mt-[25px] border-2 rounded-lg drop-shadow-sm">
        {{-- Background image with blur --}}
        <div class="absolute inset-0 bg-cover bg-center filter blur-[2px]"
            style="background-image: url('/storage/{{ $post->postsBanner }}'); z-index: -1;">
        </div>



        <div class="max-w-[600px] min-w-[600px]">
            {{-- Avatar --}}
            <div class="absolute top-[-12px] left-[10px]">
                <a href="{{ route('posts.user', $post->user) }}"><img class="rounded-full max-h-[50px] border-2 mb-5 "
                        src="\storage\{{ $post->user->avatar }}" alt=""></a>
            </div>


            {{-- Date and Auther of post --}}
            <div class=" text-white ml-[70px]">
                <p class="h-[20px]"><em><a
                            href="{{ route('posts.user', $post->user) }}">{{ $post->user->username }}</a></em></p>
                <p class="text-xs font-light">
                    {{ $post->created_at->diffForHumans() }} </p>
            </div>

            {{-- Catagory --}}
            <div
                class="text-white absolute top-[4px] right-[4px] {{ $categoryColors[$post->catagory] }} border-2 rounded-md bg-opacity-80">
                <button id="searchCatagory">
                    <h3 id="catagoryInput" class="mx-2">{{ $post->catagory }}</h3>
                </button>
            </div>

            {{-- Title --}}
            <div class="mx-3 mt-2">
                <h2 class=" text-white drop-shadow-sm ">
                    {{ $post->title }}</h2>
            </div>


            {{-- Body --}}
            @if ($full)
                <div class="text-ellipsis text-base text-white mx-3 my-2">
                    <span class="break-all">{{ $post->body }}</span>
                </div>
            @else
                <div class="text-ellipsis text-base text-white mx-3 my-2">
                    <span class="break-all ">{{ Str::limit($post->body, 50) }}</span>
                </div>
            @endif


            <div class="text-white mb-2 mr-2 flex justify-end">
                {{ $slot }}
            </div>
        </div>
    </div>

    <div class="flex flex-wrap mt-1">
        <div class="border-2 rounded-md px-1 m-1 text-white">
            <form action="{{ route('likes', $post) }}" method="POST">
                @csrf
                
                <Button>{{ $post->likesCount() }}</Button>
            </form>
        </div>

        <div class="border-2 rounded-md px-1 m-1 text-white">
            <form action="{{ route('dislikes', $post) }}" Method="POST">
                @csrf
                <button>{{ $post->dislikesCount() }}</button>
            </form>

        </div>
        
        @if (!$full)
            <div class="border-2 rounded-md  px-1 m-1">
                <a href="{{ route('posts.show', $post) }}" class="text-blue-500 ml-1 text-sm">Read more &rarr;</a>
            </div>
        @endif

    </div>
</div>
