<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function showCommentsFromPost(Request $request)
    {
        $comments = Comment::table('comment')->where('post_id', '=', $request->input('post_id'));
        $this->authorize('showCommentsFromPost', $comments);
        return $comments;
    }

    public function create(Request $request)
    {
        $comment = new Comment();
        $this->authorize('create', $comment);
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->input('post_id');
        $comment->text = $request->input('text');
        $comment->save();
        return $comment;
    }

    public function delete($id)
    {
        $comment = Comment::find($id);

        $this->authorize('delete', $comment);
        $comment->delete();

        return $comment;
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::table('comment')->where('id', '=', $id);
        $this->authorize('update', $comment);
        $comment->text = $request->input('text');
        return $comment;
    }
}
