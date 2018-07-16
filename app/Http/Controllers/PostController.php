<?php

namespace App\Http\Controllers;
use App\Posts; // svugde ovo usujemo da bi znao koja je klasa (klasa posts iz modela)

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Posts::published();//ovo Posts je iz modela kao i gore kdod use
        return view('posts.index', compact('posts')); 
    }

    public function show($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.show',compact('post')); // compact asocijativni niz, da ne bi
        //prosledjivali key value napisemo tako a ovo u zagradi post, mora da odgovara
        // $post ovo view... 
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), ['title' =>'required','body' => 'required']); 
        //this se odnosi na PostsController i on ima svoju metodu validate
        Posts::create([ //funkcija ,jedna od modela, eloquent
        'title' => request('title'),
        'body' => request('body'),
        'published' => (bool) request('published'),
        ]);
       // $post = new Posts();

       // $post->title = request('title');
       // $post->body = request('body');
        //dd(request('publihed'));
       // $post->published = (bool) request('published');

       // $post->save(); //ovako se cuva model
        
        return redirect('/posts'); //kada se sacuva redirektujemo se npr na posts

        //dd(request()->all());
        // return request()->all() moze i tako
    }
}
