@extends ('layouts.main')

@section ('container')
    @foreach ($posts as $post)
        <h4><a href="/profile/{{ $post->slug }}">{{ $post->title }}</a></h4>
        <p>By. <a href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a>    Category:    <a href="/categories/{{ $post->category->slug }}">{{ $post->category->nama }}</a></p>
        <!-- <h5>By : {{ $post["author"] }}</h4> -->
        <p>{{ $post->excerpt}}</p>
        <a href="/profile/{{ $post->slug }}">Read More..</a>
    @endforeach
@endsection
