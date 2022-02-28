@extends ('layouts.main')

@section ('container')
    <h4>{{ $post->title }}</h4>
    <!-- <h5>{{ $post->author }}</h4> -->
    <!-- <p>{{ $post->body }}</p> -->
    <p>By. <a href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a>    Category:    <a href="/categories/{{ $post->category->slug }}">{{ $post->category->nama }}</a></p>
    <!-- digunakan untuk mencetak semua tag html  -->
    {!! $post->body !!} 
    <!-- <img src="img/{{ $post["image"] }}" alt="" srcset="" width ="200px"> -->
@endsection