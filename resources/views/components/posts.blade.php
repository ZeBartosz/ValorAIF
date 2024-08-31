@foreach ($posts as $post)
        <div class="flex flex-wrap box-content p-4 my-2 border-4 rounded-md " style="background-image: url('{{ $post->postsBanner }}');">
            <div class="max-w-[600px]">
                
                {{-- Title --}}
                <div >
                    <h2 class="pr-2">{{ $post->title }}</h2>
                </div>
                
                {{-- Date of posting --}}
                <div class="text-xs font-light mb-3">
                    <p> {{ $post->created_at->diffForHumans()}} </p>
                </div>

                {{-- Body --}}
                <div class="text-sm">
                    <p class="truncate">{{ $post->body }}</p>
                </div>
                
                <div class="text-sm">
                    <span>{{ Str::words($post->body, 15) }}</span>
                    <a href="{{ route('posts.show', $post)}}" class="text-blue-500 ml-5">Read more &rarr;</a>
                </div>
            </div>
        </div>
@endforeach