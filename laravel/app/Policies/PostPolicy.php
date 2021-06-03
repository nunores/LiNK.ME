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
                foreach(Auth::user()->user->links as $link) { // TODO: fix. Only getting links and not reverselinks
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
        // Auth::check()
        return true;
    }

    public function create(Person $person, Post $post)
    {
        if (!Auth::check() || Auth::user()->is_admin) return false; // Guests and admins can't create posts
        if (Auth::user()->id != $post->user_id) return false; // If post is not from user it can't create id
        if ($post->group_id != null) {
            foreach(Auth::user()->user->groups as $group) {
                if ($group->id == $post->group_id) {
                    return true; // If post is for a group and user is in that group
                }
            }
            return false; // If user is not in the group of the post
        }
        return true; // Post is not for a group and user is valid
    }

    public function delete(Person $person, Post $post)
    {
        return Auth::check() && (Auth::user()->id == $post->user_id || Auth::user()->is_admin);
    }

    public function update(Person $person, Post $post)
    {
        return Auth::check() && Auth::user()->id == $post->user_id;
    }

    public function form(Person $person)
    {
        return Auth::check() && !Auth::user()->is_admin;
    }

    public function changeVisibility(Person $person, Post $post) {
        return Auth::check() && Auth::user()->id == $post->user_id;
    }
}
