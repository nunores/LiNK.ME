<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Person;
use App\Models\Post;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CommentPolicy
{
    use HandlesAuthorization;

    public function create(Person $person)
    {
        return true; // TODO: handle the authorization for creating a post
    }

    public function delete(Person $person, Comment $comment) {
        return Auth::user()->id == $comment->user->id;
    }

    public function showComment(Person $person, Comment $comment) {
        return true;
    }

}
