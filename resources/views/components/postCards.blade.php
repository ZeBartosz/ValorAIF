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
@props(['post', 'full' => false, 'profile' => false])


<div>

    <div class="relative">
        <div class="flex flex-wrap box-content mt-[25px] border-2 rounded-lg drop-shadow-sm cursor-pointer"
            onclick="window.location='{{ route('posts.show', $post) }}';">
            {{-- Background image with blur --}}
            <div class="absolute inset-0 bg-cover bg-center filter blur-[2px]"
                style="background-image: url('/storage/{{ $post->postsBanner }}'); z-index: -1;">
            </div>



            <div class="md:max-w-[600px] md:min-w-[600px] max-w-[300px] min-w-[300px]">
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
        {{-- Catagory --}}
        <div
            class="text-white absolute top-[4px] right-[4px] {{ $categoryColors[$post->catagory] }} border-2 rounded-md bg-opacity-80">
            <button id="searchCatagory">
                <h3 id="catagoryInput" class="mx-2">{{ $post->catagory }}</h3>
            </button>
        </div>
    </div>



    <div class="flex flex-wrap justify-between mt-1 ">
        <div class="flex flex-wr bg-black bg-opacity-15 rounded-md ">

            <div class="ml-1 my-1 border-r-[1px]">
                <form action="{{ route('likes', $post) }}" method="POST">
                    @csrf

                    <Button class="btnlike pr-2 pl-1 flex flex-wrap text-white"
                        style="text-shadow: 2px 2px #000000;"><img width="25" class="pr-1" src="{{ asset('storage/svg/like.svg') }}" alt="">{{ $post->likesCount() }}</Button>
                </form>
            </div>

            <div class="my-1 border-r-[1px]">
                <form action="{{ route('dislikes', $post) }}" Method="POST">
                    @csrf
                    <button class="btnlike pr-2 pl-2 flex flex-wrap text-white"
                        style="text-shadow: 2px 2px #000000;"><img width="25" class="pr-1" src="{{ asset('storage/svg/dislike.svg') }}" alt="">{{ $post->dislikesCount() }}</button>
                </form>
            </div>

            <div class="m-1">
                <a href="{{ route('posts.show', $post) }}" class="msgLink flex flex-wrap text-white px-1"
                    style="text-shadow: 2px 2px #000000;"><img width="25" class="pr-1 pb-1" src="{{ asset('storage/svg/reply.svg') }}">{{ $post->replyCount() }}</a>
            </div>
        </div>

        @if ($profile)
        <div class="flex bg-black bg-opacity-15 rounded-md">
            <div class="flex my-1">

                <div class=" text-green-600 border-r">
                    <button class="mx-2"><a
                        href="{{ Route('posts.edit', $post) }}">edit</a></button>
                    </div>
                    
                    <div class="text-[#b3000f]">
                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this post?')">
                        
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
