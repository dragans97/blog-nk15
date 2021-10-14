@extends('layouts.app')
@section('title', 'Register')
    
@section('content')
    <h1>Login</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate repellat adipisci labore quasi quod velit, nam similique suscipit maxime necessitatibus aperiam molestias ex illo placeat, earum doloribus ipsum laboriosam dicta.</p>
    
    <form action="{{ route('loginForm') }}" method="POST" class="my-4">
        @csrf
        
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
            @error('email')
               <div class="alert alert-danger">
                    {{ $message }}
               </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
               <div class="alert alert-danger">
                    {{ $message }}
               </div>
            @enderror
        </div>

        @if ($invalid_credentials ?? false)
            <div class="alert alert-danger">
                Invalid credentials. Please try again.
            </div>
        @endif

        <button type="submit" class="btn btn-dark">Login</button>
    </form>
@endsection