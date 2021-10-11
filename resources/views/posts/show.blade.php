@extends('layouts.app')

@section('title',  $post->title)
    

@section('content')

    <h2>
        {{ $post->title }}
    </h2>

    <p>
        {{ $post->body }}
    </p>
    <hr>
    <h5>Comments</h5>
    {{-- @if ($post->comments->count() > 0)
        @foreach ($post->comments as $comment)
            <p>{{ $comment->body }}</p>
        @endforeach
    @else
        There's no comments for this post.
    @endif --}}
    
    @forelse ($post->comments as $comment)
        <p>{{ $comment->body }}</p>
    @empty
        <p>There's no comments for this post.</p>
    @endforelse

@endsection