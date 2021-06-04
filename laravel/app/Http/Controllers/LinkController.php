<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;
use App\Models\Link;
use App\Models\FriendRequest;
use App\Models\Notification;
use SebastianBergmann\Environment\Console;

class LinkController extends Controller
{
    public function showUserLinks(Request $request)
    {
        $user = User::find($request->query('id'));

        if ($user == null) {
            return null;
        }

        return $user->links();
    }

    public function create(Request $request)
    {
        $user1 = User::find($request->input('user_id'));
        $user2 = USer::find(Auth::user()->id);

        $user1->links()->attach($user2);
        $user2->reversedLinks()->sync($user1);
        return null;
    }

    public function deny(Request $request) {
        $friend_requests = FriendRequest::all()->where("user_id_request", '=', $request->input('user_id'));
        foreach($friend_requests as $friend_request) {
            if ($friend_request->notification->user_id == Auth::user()->id) {
                $this->deleteNotifications($friend_request->notification, $friend_request);
                return null;
            }
        }
        return null;
    }

    public function request(Request $request) {
        $notification = new Notification();
        $friend_request = new FriendRequest();

        $old_friend_requests = FriendRequest::all()->where("user_id_request", "=", Auth::user()->user->id);
        foreach ($old_friend_requests as $old_friend_request) {
            if ($old_friend_request->notification->user_id == $request->input('user_id')) {
                $old_friend_request->notification->delete();
                $old_friend_request->delete();
            }
        }


        $notification->user_id = $request->input('user_id');
        $notification->save();
        $friend_request->id = $notification->id;
        $friend_request->user_id_request = Auth::user()->user->id;
        $friend_request->save();
        return [$friend_request];
    }
}
