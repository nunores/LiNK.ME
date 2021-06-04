<?php

namespace App\Http\Controllers;

use App\Models\BannedComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{

    /*public function showCommentsFromPost(Request $request)
    {
        $comments = Comment::table('comment')->where('post_id', '=', $request->input('post_id'));
        $this->authorize('showCommentsFromPost', $comments);
        return $comments;
    } */

    public function showComment($id)
    {
        $comment = Comment::find($id);
        $this->authorize('showComment', $comment);
        return view('partials.comment', ['comment' => $comment]);
    }

    public function create(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->input('post_id');
        $comment->text = $request->input('text');
        $this->authorize('create', $comment);
        $comment->save();
        return $comment;
    }

    public function delete(Request $request, $id)
    {
        $comment = Comment::find($id);

        $this->authorize('delete', $comment);
        $comment->update(["deleted" => 'true']);

        if ($request->input("admin") == true) {
            $notification = new Notification();
            $banned_comment = new BannedComment();
            $notification->user_id = Auth::user()->id;
            $banned_comment->banned_comment_id = $id;
            DB::beginTransaction();;
            $this->saveNotifications($notification, $banned_comment);
            if ( !$notification || !$banned_comment)
                DB::rollback();
            else
                DB::commit();
        }
        $this->clearNotificationsComment($comment);

        return $comment;
    }

/*     public function update(Request $request, $id)
    {
        $comment = Comment::table('comment')->where('id', '=', $id);
        $this->authorize('update', $comment);
        $comment->text = $request->input('text');
        return $comment;
    } */

}
