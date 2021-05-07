<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;
use App\Models\Post;
use App\Models\Group;
use App\Models\GroupRequest;
use App\Models\Notification;
use App\Models\User_group;
use Illuminate\Support\Facades\Log;

class GroupController extends Controller
{
    public function show($id)
    {
        if (!Auth::check()) redirect("login");
        $group = Group::find($id);
        $this->authorize('show', $group);
        $links = Auth::user()->user->getLinks();
        $posts = $group->posts;
        return view('pages.group', ['group' => $group, 'posts' => $posts, 'links' => $links]);
    }

    public function createForm()
    {
        $users = Auth::user()->user->getLinks();
        //$this->authorize('createForm'); //TODO: arranjar isto
        return view('pages.create_group', ['users' => $users]);
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

    public function request(Request $request) {
        $notification = new Notification();
        $group_request = new GroupRequest();
        $this->authorize('request', Group::class);

        // Removes all group request notifications similiar to the one being created
        $old_group_requests = GroupRequest::all()->where("group_id", "=", $request->input('group_id'));
        foreach ($old_group_requests as $old_group_request) {
            if ($old_group_request->notification->user_id == $request->input('user_id')) {
                $old_group_request->notification->delete();
                $old_group_request->delete();
            }
        }

        $notification->user_id = $request->input('user_id');
        $notification->save();
        $group_request->id = $notification->id;
        $group_request->group_id = $request->input('group_id');
        $group_request->save();
        return [$notification, $group_request];
    }
}
