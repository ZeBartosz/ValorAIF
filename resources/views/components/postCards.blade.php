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

    <div class="relative">
        <div class="flex flex-wrap box-content mt-[25px] border-2 rounded-lg drop-shadow-sm cursor-pointer"
            onclick="window.location='{{ route('posts.show', $post) }}';">
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



    <div class="flex flex-wrap mt-1 ">
        <div class="flex flex-wr bg-black bg-opacity-15 rounded-md ">

            <div class="ml-1 my-1 border-r-[1px]">
                <form action="{{ route('likes', $post) }}" method="POST">
                    @csrf

                    <Button class="btnlike pr-2 pl-1 flex flex-wrap text-white"
                        style="text-shadow: 2px 2px #000000;"><svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-heart-filled pr-1" width="22" height="22"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#b3000f" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z"
                                stroke-width="0" fill="#b3000f" />
                        </svg>{{ $post->likesCount() }}</Button>
                </form>
            </div>

            <div class="my-1 border-r-[1px]">
                <form action="{{ route('dislikes', $post) }}" Method="POST">
                    @csrf
                    <button class="btnlike pr-2 pl-2 flex flex-wrap text-white"
                        style="text-shadow: 2px 2px #000000;"><svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-heart-off pr-1" width="22" height="22"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#b3000f" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 3l18 18" />
                            <path
                                d="M19.5 12.572l-1.5 1.428m-2 2l-4 4l-7.5 -7.428a5 5 0 0 1 -1.288 -5.068a4.976 4.976 0 0 1 1.788 -2.504m3 -1c1.56 0 3.05 .727 4 2a5 5 0 1 1 7.5 6.572" />
                        </svg>
                        </svg>{{ $post->dislikesCount() }}</button>
                </form>
            </div>

            <div class="m-1">
                <a href="{{ route('posts.show', $post) }}" class="msgLink flex flex-wrap text-white px-1"
                    style="text-shadow: 2px 2px #000000;"><svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-message-circle-2 pr-1" width="22" height="22"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#b3000f" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1" />
                    </svg>{{ $post->replyCount() }}</a>
            </div>
        </div>

    </div>
</div>
