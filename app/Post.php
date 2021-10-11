<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Comment;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'is_published'];

    public static function published()
    {
        return self::where('is_published', true)->with('comments');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
}
