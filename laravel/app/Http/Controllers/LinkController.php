<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;
use App\Models\Link;

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
        $link = new Link();
        $this->authorize('create', $link);

        $link->user1_id = $request->input('user1_id');
        $link->user2_id = $request->input('user2_id');

        $link->save();
        return $link;
    }
}
