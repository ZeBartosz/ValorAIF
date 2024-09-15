@props(['post'])

@foreach ($post->comments as $comment)
    <div class="static flex flex-wrap box-content p- my-[25px] border-2 rounded-lg drop-shadow-sm bg-gray-800 bg-opacity-75">
        <div class="max-w-[600px] min-w-[600px]">
            <div class="flex m-1">
                <h1 class="ml-1"> {{ app\Models\User::Find($comment->comment_user_id)->username }}</h1>
                <div class="ml-2 mt-1 text-xs font-light">
                    <p>{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="m-2">
                <p>{{ $comment->body }}</p>
            </div>
        </div>
    </div>
@endforeach
