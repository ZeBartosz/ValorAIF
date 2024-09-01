@foreach ($posts as $post)
        <div class="static flex flex-wrap box-content p- my-[25px] border-2 rounded-md bg-white drop-shadow-sm" style="background-image: url('storage/{{ $post->postsBanner }}'); ; background-size: cover; background-position: center;">
            <div class="max-w-[600px] min-w-[600px] min-h-[]">


                {{-- Avatar --}}
                <div class="absolute top-[-12px] left-[10px]">
                    <img class="rounded-full max-h-[50px] border-2 mb-5 " src="storage\account_images\avatar\default_avator.png" alt="">
                </div>
                
                {{-- Date of posting --}}
                <div class=" text-white ml-[70px]">
                    <p class="h-[20px]" style="text-shadow: 1px 1px 2px black;"> Created by: <b>{{ $post->user->username }}</b></p>
                    <p class="text-xs font-light" style="text-shadow: 1px 1px 1px black;"> {{ $post->created_at->diffForHumans()}} </p>
                </div>
                
                {{-- Title --}}
                <div class="mx-3">
                    <h2 class=" text-white drop-shadow-sm"  style="text-shadow: 1px 1px 1px black;">{{ $post->title }}</h2>
                </div>


                {{-- Body --}}
                <div class="text-ellipsis text-sm text-white mx-3 mb-1">
                    <span class="break-all" style="text-shadow: 1px 1px 1px black;">{{ Str::words($post->body, 15) }}</span>
                    <a href="{{ route('posts.show', $post)}}" class="text-blue-500 ml-1">Read more &rarr;</a>
                </div>
            </div>
        </div>
@endforeach