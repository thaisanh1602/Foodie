<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'commentID';

    protected $fillable = [
        'postID',
        'userID',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }
}
