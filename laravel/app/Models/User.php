<?php

namespace App\Models;

use Faker\Provider\ar_JO\Person;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'email', 'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted',
    ];


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';


    /**
     * Get the person that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class, 'id');
    }

    /**
     * The groups that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_group');
    }


    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all of the likes for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get all of the reports for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    /**
     * Get all of the posts for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    /**
     * The link that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function links()
    {
        return $this->belongsToMany(Link::class, 'link', 'user1_id', 'user2_id');
    }


    /**
     * Get all of the notifications for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Get all of the friendRequests for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function friendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'user_id_request');
    }

}
