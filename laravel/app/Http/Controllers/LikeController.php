<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Log;

class LikeController extends Controller
{
    public function getLikesDislikes($id)
    {
        $likes = DB::table('likes')->where('post_id', '=', $id);
        $this->authorize('getLikesDislikes', $likes);
        return $likes;
    }

    public function createLike(Request $request)
    {
        if (!Auth::check()) return redirect("login");
        $newLike = new Like();
        $post = DB::table('post')->where('id', '=', $request->input('id'))->get();
        $this->authorize('createLike', Like::class);
        $newLike->post_id = $request->input('id');
        $newLike->likes = $request->input('likes');
        $newLike->user_id = Auth::user()->id;
        $newLike->save();
        return $newLike;
    }

    public function likeDislike(Request $request, $id)
    {
        if (!Auth::check()) return redirect("login");
        $this->authorize('likeDislike', Like::class);
        $likeDislike = DB::table('like')->where('post_id', '=', $id)->where('user_id', '=', Auth::user()->id);
        $likeDislike->update(['likes' => $request->input('likes')]);
        return $likeDislike->get();
    }

    public function delete($id)
    {
        $like = DB::table('like')->where('post_id', '=', $id)->where('user_id', '=', Auth::user()->id);
        $this->authorize('delete', Like::class);
        $like->delete();
        return true;
    }
}
