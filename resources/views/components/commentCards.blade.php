@props(['post'])

@foreach ($post->comments as $comment)
    <div class="static flex flex-wrap box-content p- my-[25px] border-2 rounded-lg drop-shadow-sm bg-gray-800 bg-opacity-75 ">
        <div class="max-w-[600px] min-w-[600px] text-white">
            <div class="flex m-1">
                <h2 class="ml-2" style="text-shadow: 1px 1px black, -1px -1px black;"> <em><a
                    href="{{ route('posts.user', $comment->comment_user_id)}}">{{ app\Models\User::Find($comment->comment_user_id)->username }}</a></em></h1>
                <div class="ml-2 mt-1 text-xs font-light">
                    <p style="text-shadow: 1px 1px black, -1px -1px black;">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="m-3">
                <p>{{ $comment->body }}</p>
            </div>
        </div>
    </div>
@endforeach
