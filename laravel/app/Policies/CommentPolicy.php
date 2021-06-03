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
        // TODO: handle the authorization for creating a post

        // Auth::check
        // is_admin

        // post grupo user ser do grupo
        // post publico pode
        // post privado tem de ser amigo ou owner

        return true;
    }

    public function delete(Person $person, Comment $comment) {
        return Auth::check() && (Auth::user()->id == $comment->user->id || Auth::user()->is_admin);
    }

    public function showComment(Person $person, Comment $comment) {

        //TODO

        // post grupo user ser do grupo
        // post publico pode
        // post privado tem de ser amigo ou owner

        return true;
    }

}
