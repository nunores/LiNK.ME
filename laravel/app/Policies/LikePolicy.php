<?php

namespace App\Policies;

use App\Models\Like;
use App\Models\Person;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LikePolicy
{
    use HandlesAuthorization;

    public function getLikesDislikes(Person $person)
    {
        return true;
    }

    public function createLike(Person $person) {
        return Auth::check();
    }

    public function likeDislike(Person $person)
    {
        return Auth::check();
    }

    public function delete(Person $person)
    {
        return Auth::check();
        //return Auth::user() == $person && (Like::table('like')->where('post_id', '=', $post->id)->where('user_id', '=', $person->id) != null);
    }
}
