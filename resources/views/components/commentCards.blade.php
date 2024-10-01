@props(['comment'])
    <div class="flex flex-wrap flex-row-reverse">
        <div
            class="static flex flex-wrap box-content  border-2 rounded-lg drop-shadow-sm bg-gray-800 bg-opacity-75 max-w-[600px] min-w-[600px] ">
            <div class=" text-white">
                <div class="flex m-1">
                    <h2 class="ml-2" style="text-shadow: 1px 1px black, -1px -1px black;"> <em><a
                                href="{{ route('posts.user', $comment->user_id) }}">{{ app\Models\User::Find($comment->user_id)->username }}</a></em>
                        </h1>
                        <div class="ml-2 mt-1 text-xs font-light">
                            <p style="text-shadow: 1px 1px black, -1px -1px black;">
                                {{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                </div>
                {{-- body --}}
                <div class="m-3">
                    <p>{{ $comment->body }}</p>
                </div>
            </div>
        </div>
    </div>

