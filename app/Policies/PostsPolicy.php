<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Posts;
use App\Models\User;

class PostsPolicy
{
    public function modify(User $user, Posts $post) : bool
    {
        return $user->id === $post->user_id or $user->isAdmin === 1;
    }
}
