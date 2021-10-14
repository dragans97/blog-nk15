<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getRegisterForm(){
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $newUser = User::create($data);

        Auth::login($newUser);
        session()->flash('success', 'You have successfully registered.');

        return redirect('/posts');

    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }

    public function getLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/posts');
        }

        return view('auth.login', [ 'invalid_credentials' => true ]);
    }


}
