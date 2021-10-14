<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Session;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        // kada se koristi with stavlja se naziv f-je iz modela
        $posts = Post::published()->with('comments')->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    // public function show($post)
    {
        // OVO VISE NE TREBA (skraceni nacin za pisanje show metode) jer sam pronadje trazeni post spram prosledjenog ID u datom modelu i sacuva ga u $post promenljivu 
        // potrebno je promeniti naziv u ruti da bude isti kao i promenljiva koju definisemo (nije vise id vec post)
        // $post = Post::findOrFail($id);
        // ukoliko ga ne pronadje, vraca error 404 - odnosno not found page 
        
        if($post->is_published){
            $post->load(['comments']);
         
            return view('posts.show', compact('post'));
        } else { 
            throw new ModelNotFoundException;
        }

        // $post = Post::with('comments')->findOrFail($post);

        // return view('posts.show', compact('post'));
        
    }

    public function create(){

        return view('posts.create');
    }

    // umesto Requesta koristimao nasu CreatePostRequst u kojoj smo definisali sta cemo validirati
    public function store(CreatePostRequest $request){
        
        // STARI NACIN
        // $post = new Post;
        // $post->title = $request->get('title');
        // $post->body = $request->get('body');
        // // ako imas is_published sacuvaj tu vrednost, ako nemas defaultna je false
        // $post->is_published = $request->get('is_published', false);
        // $post->save();

        // NOVIJI NACIN
        // $post = Post::create($request->all());

        //STARA VALIDACIJA
        // $data = $request->validate([
        //     'title' => 'required|string|min:5|max:255|unique:posts',
        //     'body' => 'required|string|max:1000|min:5',
        //     // ukoliko ne navedemo neko polje u validaciju, on ga nece proslediti dalje u requestu i samim
        //     //i samim tim nece moci biti upisan u bazu
        //     'is_published' => 'sometimes',
        // ]);

        // razlika izmedju validate() i validated() - validated uzima iz requesta sve sto je proslo validaciju

        $data = $request->validated();

        // $post = Post::create($data);
        // sada preko usera i relacije mozemo kreirati post (id ce se sam upisati pomocu relacije)
        $post = Auth::user()->posts()->create($data);

        session()->flash('success', 'Uspesno ste kreirali blog post.');
        return redirect('posts');
        
    }
}
