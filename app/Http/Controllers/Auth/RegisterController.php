<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password'
            ],
            [
                'name.required' => __('Name can not be blank'),
                'email.required' => __('Email can not be blank'),
                'email.email' => __('Email format is not correct'),
                'email.unique' => __('Email is already in use'),
                'password.required' => __('Password can not be blank'),
                'password.min' => __('Invalid password (at least 6 characters)'),
                'password_confirmation.required' => __('Repeat password can not be blank'),
                'password_confirmation.same' => __('The password does not match'),
            ]
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('site.home');
    }
}