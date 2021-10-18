@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <h1>Posts</h1>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{route('post', ['post' => $post->id])}}">
                    {{-- stari nacin --}}
                    {{-- {{ $post->title }} ({{ $post->comments->count() }}) --}}
                    {{-- novi nacin  --}}
                    {{-- razlika izmedju starog nacina jeste sto necemo pristupati komentarima kao 
                        atributu, vec cemo koristiti samo kao queryBuilder i time ubrzati ucitavanje  --}}
                    {{ $post->title }} ({{ $post->comments()->count() }})
                </a> - <small>created by <a href="{{ route('author', [ 'author' => $post->user->id ]) }}">{{ $post->user->name }}</a></small>
            </li>
        @endforeach
    </ul>
@endsection

