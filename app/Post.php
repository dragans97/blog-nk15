<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Comment;
use App\User;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'is_published', 'user_id'];

    public static function published()
    {
        return self::where('is_published', true)->with('comments', 'user');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
