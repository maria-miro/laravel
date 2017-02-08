<?php

namespace App\Policies;

use App\Http\Models\User;
use App\Http\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Comment $comment)
    {
        if ($user->owns($comment)|| $user->owns($comment->article)){
            return true;
        }
        return false;
        
    }
}
