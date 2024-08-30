@foreach ($posts as $post)
        <div class="flex flex-wrap">

            <div>
                <h2>{{ $post->title }}</h2>
                <p class=""">{{ $post->body }}</p>
                <p> {{ $post->created_at }} </p>
            </div>
        </div>
@endforeach