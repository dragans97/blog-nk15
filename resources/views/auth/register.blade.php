@extends('layouts.app')
@section('title', 'Register')
    
@section('content')
    <h1>Register</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate repellat adipisci labore quasi quod velit, nam similique suscipit maxime necessitatibus aperiam molestias ex illo placeat, earum doloribus ipsum laboriosam dicta.</p>
    
    <form action="{{ route('register') }}" method="POST" class="my-4">
        @csrf
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
               <div class="alert alert-danger">
                    {{ $message }}
               </div>
            @enderror
        </div>
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
        <div class="form-group mb-4">
            <label for="password_confirmation">Confirm password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            @error('password_confirmation')
               <div class="alert alert-danger">
                    {{ $message }}
               </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark">Register</button>
    </form>
@endsection