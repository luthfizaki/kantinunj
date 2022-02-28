@extends ('layouts.main')
    
@section ('container')
    <h1>Post Category:  {{ $category }}</h1>
    @foreach ($posts as $post)
        <h4><a href="/profile/{{ $post->slug }}">{{ $post->title }}</a></h4>
        <!-- <h5>By : {{ $post["author"] }}</h4> -->
        <p>{{ $post->excerpt}}</p>
    @endforeach
@endsection
