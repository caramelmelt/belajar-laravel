@extends('Layout.main')
@section('container')

    @foreach ($posts as $post)
        <h2>
        <a href="/posts/{{ $post["id"] }}">{{ $post["title"] }}</a>
        </h2>
        <h5>By: {{ $post["author"] }}</h5>
        <p>{{ $post["body"] }}</p>
    @endforeach

@endsection