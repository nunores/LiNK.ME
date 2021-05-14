<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Link;
use App\Models\User;

class HomeController extends Controller
{
    public function home() {

        //$posts = DB::table('post')->join('user', "post.user_id", "=", "user.id")->whereRaw('to_tsvector("post"."description" || \' \' || "user"."name") @@ plainto_tsquery(?)', ['paper'])->get();
        $posts = DB::select('SELECT post.* FROM "post" JOIN "user" ON "user"."id" = "post"."user_id" WHERE to_tsvector("post"."description" || \' \' || "user"."name") @@ plainto_tsquery(?)', ['paper']);

        // $posts = Post::all()->where('to_tsvector(post.description)', '@@', 'plainto_tsquery(' . 'paper' .')');
        // $users = User::all()->where('to_tsvector("user".name)', '@@', 'plainto_tsquery(' . 'paper' .')');

        // foreach($users as $user) {
            // $posts->merge($user->posts);
        // }

        $final = [];
        foreach ($posts as $post) {
            array_push($final, Post::find($post->id));
        }

        if (Auth::check()) {
            $links = Auth::user()->user->getLinks()->map(function($link) {
                return $link->id;
            });
            //$posts = Post::all()->whereIn('user_id', $links)->where('banned', '=', false);
            return view('pages.home', ['posts' => $final]);
        } else {
            return redirect('login');
        }
    }

}
