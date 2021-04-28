<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;
use App\Models\Post;
use App\Models\Group;
use App\Models\User_group;

class GroupController extends Controller
{
    public function getInfo($id)
    {
        $group = Group::find($id);
        $this->authorize('getInfo', $group);
        return view('pages.group', ['group' => $group]);
    }

    public function show()
    {
        return redirect('create_group');
    }

    public function getUserGroups(Request $request)
    {
        $groups = User_group::table('user_group')->where('user_id', '=', Auth::user()->id);
        $this->authorize('getUserGroups', $groups);
        return $groups;
    }

    public function create(Request $request)
    {
        $group = new Group();
        $this->authorize('create', $group);
        $group->name = $request->input('name');
        return $group;
    }
}
