@foreach ($posts as $post)
        <div class="flex flex-wrap box-content p-4 my-2 border-4 rounded-md drop-shadow-sm" style="background-image: url('{{ $post->postsBanner }}'); ; background-size: cover; background-position: center;">
            <div class="max-w-[600px]">

                {{--  --}}
                
                {{-- Title --}}
                <div>
                    <h2 class="pr-2 text-white drop-shadow-sm" style="text-shadow: 1px 1px 2px black;">{{ $post->title }}</h2>
                </div>
                
                {{-- Date of posting --}}
                <div class="text-xs font-light mb-2 text-white ">
                    <p style="text-shadow: 1px 1px 2px black;"> {{ $post->created_at->diffForHumans()}} </p>
                </div>

                {{-- Body --}}
                <div class="text-sm text-white">
                    <span style="text-shadow: 1px 1px 2px black;">{{ Str::words($post->body, 15) }}</span>
                    <a href="{{ route('posts.show', $post)}}" class="text-blue-500 ml-1">Read more &rarr;</a>
                </div>
            </div>
        </div>
@endforeach