@extends('layouts.master') 
@section('content')

<form method="POST" action="/posts">
  {{csrf_field()}} <!--ovo mora-->

  <!--@foreach($errors->all() as $error) <!--ako je prazno, u kontroleru to on gleda, a ako jeste,
  baca error ,uhvati ga u request() i ovde je ispisujemo, a ispisujemo ovde jer nas redirektuje ovde i ispisujemo svaku
  gresku kroz foreach -->
  <!--  <li>{{ $error }}</li>
  @endforeach -->
  <div class="form-group">
    <label for="title">Title</label>
    <input name='title' type="text" class="form-control" id="title">
    @include('partials.error-message' , ['fieldName' => 'title'])
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea name='body' class="form-control" id="body"></textarea>
    @include('partials.error-message' , ['fieldName' => 'body'])
  </div>
  <div class="form-group form-check">
    <input name='published' value='1' type="checkbox" class="form-check-input" id="published">
    <label class="form-check-label" for="published">Publish</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection