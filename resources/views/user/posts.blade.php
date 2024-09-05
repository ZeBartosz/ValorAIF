<x-layout>

    
    <div>
        <h1 class="flex justify-center">{{ $user->username }}'s Posts: {{ $posts->total() }}</h1>
        @foreach ($posts as $post)
        <x-postCards :post="$post" />
        @endforeach
    </div>
 
    <div>
        {{ $posts->links() }}
    </div>
</x-layout>