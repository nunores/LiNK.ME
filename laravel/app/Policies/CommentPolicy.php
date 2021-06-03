<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Person;
use App\Models\Post;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentPolicy
{
    use HandlesAuthorization;

    public function create(Person $person, Comment $comment)
    {
        return Auth::check() && !Auth::user()->is_admin;
    }

    public function delete(Person $person, Comment $comment)
    {
        return Auth::check() && (Auth::user()->id == $comment->user->id || Auth::user()->is_admin);
    }

    public function showComment(Person $person, Comment $comment) {
        return true; // If a person can see a post they can see it's comments
    }
}
