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
        // se não tiver logado, false
        // Admin não pode

        if (!Auth::check() || Auth::user()->is_admin) return false;


        if ($comment->post->group_id != null) {
            foreach(Auth::user()->user->groups as $group) {
                if ($group->id === $comment->post->group_id)
                    return true; // Post is for a group and user is on that group
            }
            return false;
        }

        if ($comment->post->private == false) {
            return true;
        }

        foreach(Auth::user()->user->links as $link) {
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

<<<<<<< HEAD
    public function showComment(Person $person, Comment $comment) {
        if ($comment->post->group_id != null) {
            foreach(Auth::user()->user->groups as $group) {
                if ($group->id === $comment->post->group_id)
                    return true; // Post is for a group and user is on that group
            }
            return false;
        }

        if ($comment->post->private == false) {
            return true;
        }
=======
    public function showComment(Person $person, Comment $comment)
    {

        // post de um grupo, tem de ser do grupo (ver Postpolicy, show())
        // se post publico -> pode
        // Se post privado, amigo ou owner
>>>>>>> 3ca8e87f6e68645a547db3b9e0d23dfa9d793766

        foreach(Auth::user()->user->links as $link) {
            if ($link->id === $comment->post->user_id)
                return true; // Post is private and user is friend
        }
        foreach(Auth::user()->user->reversedLinks as $link) {
            if ($link->id === $comment->post->user_id)
                return true; // Post is private and user is friend
        }
        return false; // Post is private and user is not friend
    }
}
