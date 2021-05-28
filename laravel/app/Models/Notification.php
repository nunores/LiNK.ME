<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    // Don't add create and update timestamps in database.
    // Created_at and updated_at not expected
    public $timestamps  = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notification';

    /**
     * Get the user that owns the Notification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * Get the friend_request associated with the Notification
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function friendRequest()
    {
        return $this->hasOne(FriendRequest::class, 'id');
    }

    /**
     * Get the postComment associated with the Notification
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function postComment()
    {
        return $this->hasOne(PostComment::class, 'id');
    }

    /**
     * Get the likedPost associated with the Notification
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function likedPost()
    {
        return $this->hasOne(LikedPost::class, 'id');
    }

    /**
     * Get the bannedpost associated with the Notification
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bannedPost()
    {
        return $this->hasOne(BannedPost::class, 'id');
    }

    /**
     * Get the bannedComment associated with the Notification
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bannedComment()
    {
        return $this->hasOne(BannedComment::class, 'id');
    }

    /**
     * Get the groupRequest associated with the Notification
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function groupRequest()
    {
        return $this->hasOne(GroupRequest::class, 'id');
    }
}
