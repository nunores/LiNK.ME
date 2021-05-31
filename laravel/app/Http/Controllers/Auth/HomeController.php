<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Link;
use App\Models\Report;
use App\Models\User;

class HomeController extends Controller
{
    public function home() {
        if (Auth::check()) {
            if (Auth::user()->is_admin) {
                $posts = Post::all()->where('deleted', '=', false)->sortByDesc('id')->take(20);
                $reports = Report::all()->sortByDesc('id')->take(20);
                return view('pages.admin', ['posts' => $posts, 'reports' => $reports]);
            } else {
                $links = Auth::user()->user->getLinks()->map(function($link) {
                    return $link->id;
                });
                $posts = Post::all()->whereIn('user_id', $links)->where('deleted', '=', false)->sortByDesc('id')->take(20);
                return view('pages.home', ['posts' => $posts]);
            }
        } else {
            return redirect('login');
        }
    }

}
