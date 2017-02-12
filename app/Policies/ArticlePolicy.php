<?php

namespace App\Policies;

use App\Http\Models\User;
use App\Http\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if($user->isAdmin()) {
            return true;
        }
    }

    public function update(User $user, Article $article)
    {
        return $user->owns($article);
    }
   
    public function delete(User $user, Article $article)
    {
        return $user->owns($article);
    }
}
