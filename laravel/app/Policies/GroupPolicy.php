<?php

namespace App\Policies;

use App\Models\Person;
use App\Models\Group;
use App\Models\GroupRequest;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GroupPolicy
{
    use HandlesAuthorization;

    public function show(Person $person, Group $group)
    {
        if (Auth::user()->is_admin) return true;
        $user_groups = Auth::user()->user->groups;
        $in_group = false;
        foreach ($user_groups as $user_group) {
            if ($user_group->id == $group->id)
                $in_group = true;
        }
        return $in_group;
    }

    public function createForm(Person $person)
    {
        return Auth::check() && !Auth::user()->is_admin;
    }

    public function getUserGroups(Person $person, Group $group)
    {
        return Auth::check();
    }

    public function create(Person $person, Group $group)
    {
        return Auth::check() && !Auth::user()->is_admin;
    }

    public function request(Person $person, Group $group)
    {
        return Auth::check();
    }
}
