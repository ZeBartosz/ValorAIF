<x-layout>
    <div class="">
        <h1 class="flex justify-center text-white mt-4 text-xl">Home page</h1>
        @foreach ($posts as $post)
            <x-postCards :post="$post">
                </x-posts>
        @endforeach

        <div>
            {{ $posts->links() }}
        </div>

    </div>

</x-layout>
