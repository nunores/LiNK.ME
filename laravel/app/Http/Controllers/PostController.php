<?php

namespace App\Http\Controllers;

use App\Models\BannedPost;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;
use App\Models\Post;
use App\Models\Report;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::find($id);
        $this->authorize('show', $post);
        if (Auth::check() && Auth::user()->is_admin) {
            $reports = Report::all()->sortByDesc('id')->take(20);
            return view('pages.post', ['post' => $post, "comments" => $post->comments->where("deleted", "=", false), "reports" => $reports]);
        } else {
            return view('pages.post', ['post' => $post, "comments" => $post->comments->where("deleted", "=", false)]);
        }
    }

    public function create(Request $request)
    {
        if ((strlen($request->input('description')) == 0 && !$request->has('picture')) ||
            ($request->has('description') && strlen($request->input('description')) > 250)) {
                return new Post();
        }

        $post = new Post();
        $post->user_id = Auth::user()->id;

        $post->description = $request->input('description');
        if ($request->input("group_id") != null) {
            $post->private = "false";
            $post->group_id = $request->input('group_id');
        } else {
            if ($request->input('private') !== null)
            {
                $post->private = $request->input('private');
            }
            else{
                $post->private = false;
            }
            $post->group_id = null;
        }
        $this->authorize('create', $post);
        $post->save();

        if ($request->has('picture')) {
            $post->picture = asset("/images/posts/" . $post->id);
            $request->file('picture')->move(public_path() . "/images/posts/", $post->id . ".png");
        }
        $post->save();

        return $post;
    }

    public function delete(Request $request, $id)
    {
        $post = Post::find($id);

        $this->authorize('delete', $post);
        if ($request->input("admin") == true) {
            $post->update(["banned" => 'true']);

            $notification = new Notification();
            $banned_post = new BannedPost();
            $notification->user_id = Auth::user()->id;
            $banned_post->banned_post_id = $id;
            DB::beginTransaction();
            $this->saveNotifications($notification, $banned_post);
            if ( !$notification || !$banned_post)
                DB::rollback();
            else
                DB::commit();
        } else {
            $post->update(['deleted' => 'true']);
        }
        $this->clearNotificationsPost($post);

        return $post;
    }


    public function showPostInfo(Request $request, $id)
    {
        $post = Post::find($id);

        if ($post == null) {
            return null;
        }

        return view("partials.post", ["post" => $post, "comments" => $post->comments->where("deleted", "=", false)->take(2)]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $this->authorize('update', $post);
        $post->description = $request->input('description');
        $post->private = $request->input('private');

        return $post;
    }

    public function showPostForm()
    {
        $this->authorize('form', Post::class);
        return view("partials.post_form");
    }

    public function search(Request $request)
    {
        $posts = DB::select('
            SELECT post.*
            FROM "post"
            JOIN "user" ON "user"."id" = "post"."user_id"
            JOIN "person" ON "person"."id" = "user"."id"
            WHERE "post"."deleted" = false
            AND ("post"."private" = false OR
                "post"."user_id" IN (
                    SELECT user1_id
                    FROM link
                    WHERE user2_id = :auth_user
                ) OR "post"."user_id" IN (
                    SELECT user2_id
                    FROM link
                    WHERE user1_id = :auth_user
                )
            )
            AND to_tsvector("post"."description" || \' \' || "user"."name" || \' \' || "person"."username") @@ plainto_tsquery(:search)',
            ["search" => $request->input("search"), "auth_user" => Auth::check() && !Auth::user()->is_admin ? Auth::user()->id : -1]);

        $final = [];
        foreach ($posts as $post) {
            array_push($final, Post::find($post->id));
        }

        if (Auth::check()) {
            if (!Auth::user()->is_admin) {
                return view('pages.search_posts', ['posts' => $final, 'search' => $request->input("search")]);
            } else {
                $reports = Report::all()->sortByDesc('id')->take(20);
                return view('pages.search_posts', ['posts' => $final, 'reports' => $reports, 'search' => $request->input("search")]);
            }
        } else {
            return view('pages.search_posts', ['posts' => $final, 'search' => $request->input("search")]);
            //return redirect('login');
        }
    }

    public function postOrder($general)
    {
        if ($general == 'true'){
            $posts = Post::where('deleted', '=', false)->orderByDesc('id')->paginate(20)->withPath('/api/more_posts');
            return view('partials.home_center_col',  ['posts' => $posts]);
        }
        else if ($general == 'false'){
            $links = Auth::user()->user->getLinks()->map(function($link) {
                return $link->id;
            });
            $posts = Post::where('deleted', '=', false)->whereIn('user_id', $links)->orderByDesc('id')->paginate(20)->withPath('/api/more_posts');
            return view('partials.home_center_col',  ['posts' => $posts]);
        }
    }

    public function morePosts(Request $request) {
        if (!Auth::check()) {
            return Post::where('deleted', '=', false)->where('private', '=', false)->orderByDesc('id')->paginate(20);
        }
        if (Auth::user()->is_admin) {
            return Post::where('deleted', '=', false)->orderByDesc('id')->paginate(20);
        }
        $links = Auth::user()->user->getLinks()->map(function($link) {
            return $link->id;
        });
        Log::debug($request);
        if ($request->input('general') == "true") {
            return Post::where('deleted', '=', false)->orderByDesc('id')->paginate(20);
        } else {
            return Post::whereIn('user_id', $links)->where('deleted', '=', false)->orderByDesc('id')->paginate(20);
        }
    }

    public function changeVisibility(Request $request, $id) {
        $post = Post::find($id);
        $this->authorize('changeVisibility', $post);

        $post->private = $request->input('private') == "true" ? true : false;
        $post->save();
        return $post;
    }
}


