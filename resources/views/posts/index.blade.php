<x-layout>

    <h1>Home page</h1>

    @foreach ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->body }}</p>
            <p> {{ $post->created_at }} </p>
            <img src="{{ $post->postsBanner }}" alt="">
        </div>
    @endforeach
</x-layout>