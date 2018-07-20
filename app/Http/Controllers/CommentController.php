<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Mail; //dodali za mejl
use App\Mail\CommentReceived; //dodali za mejl

class CommentController extends Controller
{
   public function store($id)
   {
        $this->validate(request(), ['author' =>'required','text' => 'required']); 
        $post = Post::find($id);
        $post->addComment(request('author'), request('text'), request('post_id'));

        // $comment = $post->comments()->create([
        //     'author' => request('author'),
        //             'text' => request('text'),
        //           'post_id' => $post->id
        
            
        // ]);
      
    //     Comment::create([
    //         'author' => request('author'),
    //         'text' => request('text'),
    //         'post_id' => request('post_id')

    //     ]);

   

    Mail::to($post->user)->send(new CommentReceived($post));

        return back();
     }
}
