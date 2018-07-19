<?php

namespace App\Http\Controllers;
use App\Post; // svugde ovo usujemo da bi znao koja je klasa (klasa posts iz modela)
use App\Comment;

use Illuminate\Http\Request;

class PostController extends Controller
{

     public function __construct()
     {
         $this->middleware('auth', ['except' => ['index', 'show']]);//samo koji su ulogovani mogu da koriste ove metode
        //sem index i show a moze store i create i obrnuto
     }
    public function index()
    {
        $posts = Post::published();//ovo Posts je iz modela kao i gore kdod use
        return view('posts.index', compact('posts')); 
    }

    public function show($id)
    {
        $post = Post::with('comments')->find($id); //ovo comments je funkcija iz posts.php
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
        Post::create([ //funkcija ,jedna od modela, eloquent
        'title' => request('title'),
        'body' => request('body'),
        'published' => (bool) request('published'),
        'user_id' =>auth()->user()->id //trazi id od usera i stavlja u user_id
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
