<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Share extends Model
{
    protected $table = 'post_shares';

    public $timestamps = true;

    protected $fillable = [
        'postID',
        'userID',
        'sharedAt',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'postID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
