@extends('layouts.master') 

@section('content')
    <div class="blog-post">
        <h2 class="blog-post-title">{{$post->title}}</h2>
        <p class="blog-post-meta">{{$post->created_at}} </p>

        <p> {{$post->body}}</p>
        </div><!-- /.blog-post -->
<form method="POST" action="/posts/{{$post->id}}">
  {{csrf_field()}}
<div class="form-group">
    <label for="author">Name</label>
    <input name='author' type="text" class="form-control" id="author">
    @include('partials.error-message' , ['fieldName' => 'author'])
  </div>
  <div class="form-group">
    <label for="text">Comment</label>
    <textarea name='text' class="form-control" id="text"></textarea>
    @include('partials.error-message' , ['fieldName' => 'text'])
  </div>
  <input name='post_id' type="hidden" class="form-control" id="post_id" value = "{{$post->id}}">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<br><h2>Comments</h2><br>
 @foreach($post->comments as $comment) <!-- ovo comments se odnosi na funkciju u post.php-->

<div class='card-block'>
  <p style="font-weight:bold; font-size:1rem;">{{ $comment->author }}<p>
  <p style="font-size:0.7rem;">{{ $comment->created_at }}<p>
  <p>{{ $comment->text }} </p>
</div>
 @endforeach


@endsection
