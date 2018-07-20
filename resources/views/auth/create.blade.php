@extends('layouts.master') 
@section('content')

<form method="POST" action="/register">
  {{csrf_field()}} <!--ovo mora-->
  <div class="form-group">
    <label for="name">Name</label>
    <input name='name' type="text" class="form-control" id="name">
    @include('partials.error-message' , ['fieldName' => 'name'])
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name='email' class="form-control" id="email">
    @include('partials.error-message' , ['fieldName' => 'email'])
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name='password' class="form-control" id="password">
    @include('partials.error-message' , ['fieldName' => 'password'])
  </div>

  <div class="form-group">
    <label for="password">Age</label>
    <input type="number" name='age' class="form-control" id="age">
    @include('partials.error-message' , ['fieldName' => 'age'])
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>

@endsection