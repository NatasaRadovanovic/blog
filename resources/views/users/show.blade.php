@extends('layouts.master')

@section('content')

  
   <h1>{{ $user->name }} User posts</h1>
   @foreach($user->posts as $post) <!-- ovo posts je iz modela User pa fja posts-->

   <div class="blog-post">
       <h2 class="blog-post-title"><a href='/posts/{{$post->id}}' >{{ $post->title }}</a></h2>
       <p class="blog-post-meta">{{$post->created_at}}</p>
       <p> {{$post->body}}</p>

   </div><!-- /.blog-post -->
   @endforeach


@endsection
<!-- @section('sidebar') -->