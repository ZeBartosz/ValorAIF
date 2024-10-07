<?php

namespace App\Policies;

use App\Models\Comments;
use Illuminate\Auth\Access\Response;
use App\Models\User;

class CommentsPolicy
{
    public function modify(User $user, Comments $comment) : bool
    {
        return $user->id === $comment->user_id or $user->isAdmin === 1;
    }
}
