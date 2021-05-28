<?php

namespace App\Policies;

use App\Models\Person;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ReportPolicy
{
    use HandlesAuthorization;

    public function reportPost(Person $person, $report) {
        return Auth::check() && !Auth::user()->is_admin;
    }

    public function reportComment(Person $person, $report) {
        return Auth::check() && !Auth::user()->is_admin;
    }
}
