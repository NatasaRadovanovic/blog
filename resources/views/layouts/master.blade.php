
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="/css/blog.css" rel="stylesheet">
 

    <title>Blog Template for Bootstrap</title>

  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="#">Home</a>

          @if(auth()->check()) <!--check proverava da li je ulogovan ako jeste onda.. -->
          <a href="#" class="nav-link">{{auth()->user()->name}}</a> <!--ovako se moze dobiti ime usera 
          tog ulogovanog ako postoji -->
          <a href="/logout" class="nav-link">Logout</a>
          @else
          <a href="/login" class="nav-link">Login</a>
          <a href="/register" class="nav-link">Register</a>
          @endif
        </nav>
      </div>
    </div>

    @include('partials.header') <!-- stavi ceo fajl a kod extends tj razlika tu pravimo ono 
    yeald pa mozemo samo deo,tj mi smo npr samo content, a mogli smo pored contenta imati
    npr sidebar..pa mozemo samo content a ne i sidebar..a sa include bi sve-->


    <div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">

        @yield('content')

        </div><!-- /.blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          
          <div class="sidebar-module">
            <h4>Tags</h4>
            <ol class="list-unstyled">
            @foreach($tags as $tag)
              <li><a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a></li>

              @endforeach
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

   
    @include('partials.footer')



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
