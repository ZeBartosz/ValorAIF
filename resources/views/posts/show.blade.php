<x-layout>
    <div>

        <x-postCards :post="$post" full />
        <div
            class="static flex flex-wrap box-content my-[25px] border-2 rounded-lg drop-shadow-sm bg-gray-800 bg-opacity-75">
            <div class="m-3">
                <form action="{{ route('commentStore', $post) }}" method="Post">
                    @csrf

                    {{-- body --}}
                    <div class="m-3">
                        <label for="body">Reply to the post</label>
                        <textarea name="body" id="" cols="70" rows="2" class="shadow md:shadow-lg"></textarea>
                        @error('body')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                    <button class="btn">Reply</button>
                </form>
            </div>
        </div>

        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif


        <x-commentCards :post="$post" />

    </div>
</x-layout>
