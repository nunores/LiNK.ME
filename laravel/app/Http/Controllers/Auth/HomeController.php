<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Link;

class HomeController extends Controller
{
    public function home() {
        if (Auth::check()) {
            //$posts = Post::all()->where('id', '>', '173')->where('id', '<', '185')->where('banned', '=', false);
            $links1 = DB::table('link')->select('user2_id as friend_id')->where('user1_id', '=', 20);
            $links2 = DB::table('link')->select('user1_id as friend_id')->where('user2_id', '=', 20);
            $links = $links1 ->unionAll($links2);
            //$array = json_decode(json_encode($links), true);
            print_r($links);
            $posts = Post::all()->whereIn('user_id', $links)->where('banned', '=', false);
            echo $posts;
            //return view('pages.home', ['posts' => $posts]);
        } else {
            return redirect('login');
        }
    }

}
