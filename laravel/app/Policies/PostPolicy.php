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
        return !$post->banned;
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
