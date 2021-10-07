<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // OVO VISE NE TREBA (skraceni nacin za pisanje show metode) jer sam pronadje trazeni post spram prosledjenog ID u datom modelu i sacuva ga u $post promenljivu 
        // potrebno je promeniti naziv u ruti da bude isti kao i promenljiva koju definisemo (nije vise id vec post)
        // $post = Post::findOrFail($id);
        // ukoliko ga ne pronadje, vraca error 404 - odnosno not found page 
        
        if($post->is_published){
            return view('posts.show', compact('post'));
        } else { 
            throw new ModelNotFoundException;
        }
        
    }
}
