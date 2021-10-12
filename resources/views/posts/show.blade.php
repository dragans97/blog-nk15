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

    <form action="{{ route('create-comment', ['post' => $post->id]) }}" method="POST">
        @csrf
        <div class="form-group my-3">
            <label for="body">Add comment: </label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Write.."></textarea>
            @error('body') 
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection