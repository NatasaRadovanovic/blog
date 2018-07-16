@extends('layouts.master') 

@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">{{$post->title}}</h2>
        <p class="blog-post-meta">{{$post->created_at}} </p>

        <p> {{$post->body}}</p>
        </div><!-- /.blog-post -->

 @foreach($post->comments as $comment) <!-- ovo comments se odnosi na funkciju u post.php

 <li>{{ $comment->author }}</li>
 <li>{{ $comment->text }} </li>
 @endforeach

@endsection
