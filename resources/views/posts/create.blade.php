@extends('layouts.app')

@section('title', 'Create a Post')
    
@section('content')
    <h1>Create a blog post</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis ipsum nesciunt quibusdam itaque quis consequatur nihil porro aperiam dignissimos a.</p>
    
    <form action="/posts" method="POST" class="my-5">
        @csrf
        <div class="form-gropup mb-3">
            <label for="title" >Title</label>
            <input id="name" name="title" class="form-control" type="text"  placeholder="Title...">
            @error('title')
                <div  class="alert alert-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
           
        </div>
        <div class="form-gropup mb-3">
            <label for="body" >Body</label>
            <textarea id="body" name="body" cols="30" rows="10" class="form-control" placeholder="Body text.."></textarea>
            @error('body')
                <div  class="alert alert-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-check mb-3">
            <input id="is_published" name="is_published" type="checkbox" class="form-check-input" name="is_published" value="1">
            <label for="is_published" class="form-check-label">Publish right away</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection