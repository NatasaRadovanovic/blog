Hi {{ $post->user->name }}, 

You have a new comment on your <a href="{{ url('posts/' .$post->id) }}"> <!--moramo koristiti
url helper jer necemo vise na nasoj aplikaciji  -->
{{ $post->title }}</a> post.

Comment content:
<p>
    {{ $post->comments->last() }}
</p>
