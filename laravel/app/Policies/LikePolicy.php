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
        return Auth::check() && !Auth::user()->is_admin;
    }

    public function likeDislike(Person $person)
    {
        return Auth::check() && !Auth::user()->is_admin;
    }

    public function delete(Person $person)
    {
        return Auth::check() && !Auth::user()->is_admin;
    }
}
