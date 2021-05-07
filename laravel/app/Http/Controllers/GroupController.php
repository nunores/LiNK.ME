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
    public function show($id)
    {
        if (!Auth::check()) redirect("login");
        $group = Group::find($id);
        $this->authorize('show', $group);
        $links = Auth::user()->user->links;
        $posts = $group->posts;
        return view('pages.group', ['group' => $group, 'posts' => $posts, 'links' => $links]);
    }

    public function createForm()
    {
        $users = Auth::user()->links;
        //$this->authorize('createForm'); //TODO: arranjar isto
        return view('pages.create_group', ['suggested_users' => $users]);
    }

    public function getUserGroups(Request $request)
    {
        $groups = User_group::table('user_group')->where('user_id', '=', $request->input("id"));
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
