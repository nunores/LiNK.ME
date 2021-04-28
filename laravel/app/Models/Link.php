<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    // Don't add create and update timestamps in database.
    // Created_at and updated_at not expected
    public $timestamps  = false;

    // TODO: Não sei meter primary key nesta badalhoquice

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'link';

    /**
     * Get the user1 associated with the Link
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user1()
    {
        return $this->hasOne(User::class, 'user1_id');
    }

    /**
     * Get the user2 associated with the Link
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user2()
    {
        return $this->hasOne(User::class, 'user2_id');
    }
}
