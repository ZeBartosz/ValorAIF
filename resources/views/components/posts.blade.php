@foreach ($posts as $post)
        <div class="flex flex-wrap box-content p-4 my-2 border-4 rounded-md">
            <div class="max-w-96 ">
                <h2>{{ $post->title }}</h2>
                <p class="overflow-hidden text-ellipsis ..."">{{ $post->body }}</p>
                <p> {{ $post->created_at }} </p>
            </div>
        </div>
@endforeach