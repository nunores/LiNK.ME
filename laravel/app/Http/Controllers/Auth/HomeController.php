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
            $links = Auth::user()->user->getLinks()->map(function($link) {
                return $link->id;
            });
            $posts = Post::all()->whereIn('user_id', $links)->where('banned', '=', false);
            return view('pages.home', ['posts' => $posts]);
        } else {
            return redirect('login');
        }
    }

}
