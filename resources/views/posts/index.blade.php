<x-layout>
    <div>

        @if ($search === '')
            <h1>Home page</h1>
        @else
            <h1>Searched for: {{ $search }}</h1>
        @endif

        @foreach ($posts as $post)
            <x-postCards :post="$post">
                </x-posts>
        @endforeach

        <div>
            {{ $posts->links() }}
        </div>

    </div>

</x-layout>
