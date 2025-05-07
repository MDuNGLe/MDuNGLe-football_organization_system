<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.create');
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated ();

        $user = User::create($validated);
        event(new Registered($user));
        return redirect()->route('login')->with('success', 'Успешно Зарегестрирован');
    }

    public function loginForm()
    {
        return view('auth.login-form');
    }

    public function loginAuth(LoginRequest $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // if ($request->user()->hasVerifiedEmail()) {

        if(Auth::attempt($validated)){
            return redirect()->intended('/')->with('succes', 'Succes login');
        }
    // } else {
    //     return back()->withErrors([
    //         'email' => 'Подтвердите почту '
    //     ]);
    // }

        return back()->withErrors([
            'email' => 'Wrong email or password'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}