@extends('layouts.app')

@section('title',  $post->title)
    

@section('content')
    <a href="/posts">Go to Posts page</a>
    <h2>
        {{ $post->title }}
    </h2>

    <p>
        {{ $post->body }}
    </p>
@endsection