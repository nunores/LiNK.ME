<?php

namespace App\Policies;

use App\Models\Person;
use App\Models\Post;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PostPolicy
{
    use HandlesAuthorization;

    public function show(Person $person, Post $post)
    {
        if ($post->banned) return false; // Banned post
        if (!Auth::check()) return !$post->private; // For guests
        if (Auth::user()->is_admin) return true; // For admins

        if ($post->group_id != null) {
            foreach(Auth::user()->user->groups as $group) {
                if ($group->id === $post->group_id)
                    return true; // Post is for a group and user is on that group
            }
            return false; // Post is for a group and user is not on that group
        } else {
            if ($post->private) {
                foreach(Auth::user()->user->links as $link) {
                    if ($link->id === $post->user_id)
                        return true; // Post is private and user if friend
                }
                return false; // Post is private and user is not friend
            } else
                return true; // Post is public
        }
    }

    public function showPostInfo(Person $person)
    {
        return true;
    }

    public function create(Person $person)
    {
        return Auth::user() == $person && !Auth::user()->isAdmin;
    }

    public function delete(Person $person, Post $post)
    {
        return Auth::user()->id == $post->user_id;
    }

    public function update(Person $person, Post $post)
    {
        return Auth::user() == $person && $person->id == $post->user_id;
    }
}
