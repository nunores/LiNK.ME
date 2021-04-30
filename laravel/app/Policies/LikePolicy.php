<?php

namespace App\Policies;

use App\Models\Like;
use App\Models\Person;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class LikePolicy
{
    use HandlesAuthorization;

    public function getLikesDislikes(Person $person)
    {
        return true;
    }

    public function likeDislike(Person $person)
    {
        return Auth::user() == $person;
    }

    public function delete(Person $person, Post $post)
    {
        return Auth::user() == $person && (Like::table('like')->where('post_id', '=', $post->id)->where('user_id', '=', $person->id) != null);
    }
}
