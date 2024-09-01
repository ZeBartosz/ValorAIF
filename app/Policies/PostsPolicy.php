<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Posts;
use App\Models\User;

class PostPolicy
{
    public function modify(User $user, Posts $posts) : bool
    {
        return $user->id === $posts->user_id;
    }
}
