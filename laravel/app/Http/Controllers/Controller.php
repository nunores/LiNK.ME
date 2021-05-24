<?php

namespace App\Http\Controllers;

use App\Models\LikedPost;
use App\Models\Notification;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\Report;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveNotifications($notification, $notification_type) {
        $notification->save();
        $notification_type->id = $notification->id;
        $notification_type->save();
    }

    public function deleteNotifications($notification, $notification_type) {
        $notification->delete();
        $notification_type->delete();
    }

    public function clearNotifications(Post $post) {
        $likedPosts = LikedPost::all()->where('liked_post_id', '=', $post->id);
        foreach ($likedPosts as $likedPost) {
            $notification = Notification::find($likedPost->id);
            Log::debug($notification);
            DB::beginTransaction();
            $this->deleteNotifications($notification, $likedPost);
            DB::commit();
        }
        $postComments = PostComment::all()->where('post_comment_id', '=', $post->id);
        foreach ($postComments as $postComment) {
            $notification = Notification::find($postComment->id);
            Log::debug($notification);
            DB::beginTransaction();
            $this->deleteNotifications($notification, $postComment);
            DB::commit();
        }
        $reports = Report::all()->where('post_id', '=', $post->id);
        foreach ($reports as $report) {
            $report->delete();
        }
    }
}
