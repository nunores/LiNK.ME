<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;

class LikeController extends Controller
{
    public function getLikesDislikes($id)
    {
        $likes = Like::table('likes')->where('post_id', '=', $id);
        $this->authorize('getLikesDislikes', $likes);
        return $likes;
    }

    public function likeDislike(Request $request, $id)
    {
        $likes = Like::table('like')->where('post_id', '=', $id);
        $this->authorize('likesDislike', $likes);
        $likeDislike = $likes->where('user_id', '=', Auth::user()->id);
        if ($likeDislike == null)
        {
            $newLike = new Like();
            $newLike->post_id = $request->input('id');
            $newLike->likes = $request->input('likes');
            $newLike->user_id = Auth::user()->id;
            return $newLike;
        }
        else
        {
            $likeDislike->likes = $request->input('likes');
            return $likeDislike; 
        }
    }

    public function delete($id)
    {
        $like = Like::table('like')->where('post_id', '=', $id)->where('user_id', '=', Auth::user()->id);
        $this->authorize('delete', $like);
        $like->delete();
        return $like;
    }
}
