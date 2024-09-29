<x-layout>
    <div class="">
        <h1 >Home page</h1>
        @foreach ($posts as $post)
            <x-postCards :post="$post">
                </x-posts>
        @endforeach

        <div>
            {{ $posts->links() }}
        </div>

    </div>

</x-layout>
