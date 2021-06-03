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
        // se não tiver logado, false
        // Admin não pode

        // post de um grupo, tem de ser do grupo (ver Postpolicy, show())
        // se post publico -> pode
        // Se post privado, amigo ou owner


        return true; // TODO: handle the authorization for creating a post
    }

    public function delete(Person $person, Comment $comment) {
        return Auth::check() && (Auth::user()->id == $comment->user->id || Auth::user()->is_admin);
    }

    public function showComment(Person $person, Comment $comment) {

        // post de um grupo, tem de ser do grupo (ver Postpolicy, show())
        // se post publico -> pode
        // Se post privado, amigo ou owner

        return true;
    }

}
