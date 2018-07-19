@extends('layouts.master') 
@section('content')

<form method="POST" action="/login">
  {{csrf_field()}} 
  <div class="form-group">
    <label for="email">Email</label>
    <input name='email' type="text" class="form-control" id="email" required>
    @include('partials.error-message' , ['fieldName' => 'email'])
  </div>
  <div class="form-group">
    <label for="email">Password</label>
    <input type="password" name='password' class="form-control" id="password" required>
@include    ('partials.error-message' , ['fieldName' => 'password'])
@include('partials.error-message' , ['fieldName' => 'message']) <!--nova poruka  koja je u login controll-->
  </div>
 
  <button type="submit" class="btn btn-primary">Login</button>
  
</form>

@endsection