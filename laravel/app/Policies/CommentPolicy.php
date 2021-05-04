<?php

namespace App\Policies;

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
        return true; // TODO: handle the authorization ofor creating a post
    }

}
