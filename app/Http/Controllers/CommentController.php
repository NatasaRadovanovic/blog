<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
   public function store(Post $post)
   {
        $this->validate(request(), ['author' =>'required','text' => 'required']); 
        $post->addComment(request('author'), request('text'), request('post_id'));
      
    //     Comment::create([
    //         'author' => request('author'),
    //         'text' => request('text'),
    //         'post_id' => request('post_id')

    //     ]);

        return back();
   }

   
}
