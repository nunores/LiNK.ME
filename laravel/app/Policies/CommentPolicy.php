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

    public function create(Person $person, Comment $comment)
    {
        if (!Auth::check() || Auth::user()->is_admin) return false;

        if ($comment->post->group_id != null) {
            foreach (Auth::user()->user->groups as $group) {
                if ($group->id === $comment->group_id)
                    return true; // Post is for a group and user is on that group
            }
            return false;
        }

        if ($comment->post->private == false) {
            return true;
        }

        foreach (Auth::user()->user->links as $link) { // TODO: fix. Only getting links and not reverselinks
            if ($link->id === $comment->post->user_id)
                return true; // Post is private and user is friend
        }
        foreach (Auth::user()->user->reversedLinks as $link) {
            if ($link->id === $comment->post->user_id)
                return true; // Post is private and user is friend
        }
        return false; // Post is private and user is not friend
    }

    public function delete(Person $person, Comment $comment)
    {
        return Auth::check() && (Auth::user()->id == $comment->user->id || Auth::user()->is_admin);
    }

    public function showComment(Person $person, Comment $comment)
    {

        // post de um grupo, tem de ser do grupo (ver Postpolicy, show())
        // se post publico -> pode
        // Se post privado, amigo ou owner

        return true;
    }
}
