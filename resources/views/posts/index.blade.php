@extends('layouts.master') <!-- moramo da ukljucimo master blade gde je taj layouts
a layout je folder koji mi napravimo u viewu i onda u tom layoutu smo 
pravili master.blade -->

@section('content') <!-- to je ta sekcija sto smo napravili -->
@if(auth()->check()) <!--ako nije ulogova ne vidi dugme a ako jeste vidi ga -->
<a class="btn btn-primary" href='/posts/create'> Create post</a><br><br>
@endif
 
 
    @foreach($posts as $post)
    <div class="blog-post">
      <h2 class="blog-post-title"><a href="{{action('PostController@show', $post->id)}}">{{$post->title}}</a></h2>
       <p class="blog-post-meta">{{$post->created_at}} </p>
       <p> {{$post->body}}</p>
    </div><!-- /.blog-post -->
    @endforeach
   
@endsection