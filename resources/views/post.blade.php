@extends('Layout.main')
@section('container')

    <article>
        <h2>{{ $post->title }}</h2> 
        <h5>By : Ajeng Kalista in <a href="/categories/{{ $post->category->slug}}"> {{ $post->category->name }} </a></h5> 
        <p>{!! $post->body !!}</p>
    </article>
    
    <!-- Jika menggunakan database, maka ambil data spt diatas 
    Jika menggunakan array maka spt ini {{ $post["title"] }} -->

    <a href="/blog">Back to Post</a>

@endsection