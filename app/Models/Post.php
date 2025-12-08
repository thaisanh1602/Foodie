<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'postID';
    protected $fillable = [
        'userID',
        'userName',
        'title',
        'level',
        'content',
        'privacy',
        'image',

    ];

    public function likes()
    {
        return $this->hasMany(Like::class, 'postID', 'postID');
    }

    public function isLikedByUser()
    {
        return $this->likes()->where('userID', Auth::id())->exists();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'postID', 'postID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }
    public function shares()
    {
        return $this->hasMany(Share::class, 'postID', 'postID');
    }

    public function isSharedByUser()
    {
        return $this->shares()
            ->where(
                'userID',
                Auth::id()
            )
            ->exists();
    }
}
