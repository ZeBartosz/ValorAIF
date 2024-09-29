<x-layout>

    
    <div>
        <h1>{{ $user->username }}'s Posts: {{ $posts->total() }}</h1>
        @foreach ($posts as $post)
        <x-postCards :post="$post" />
        @endforeach
        <div>
            {{ $posts->links() }}
        </div>
    </div>
 
</x-layout>