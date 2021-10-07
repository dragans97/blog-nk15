<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static function published()
    {
        return self::where('is_published', true);
    }
}
