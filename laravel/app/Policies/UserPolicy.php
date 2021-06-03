<?php

namespace App\Policies;

use App\Models\Person;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserPolicy
{
    use HandlesAuthorization;

    public function show(Person $person, User $user)
    {
        return !$user->deleted;
    }

    public function delete(Person $person, User $user) {
        return Auth::check() && Auth::user()->id == $user->id;
    }

}
