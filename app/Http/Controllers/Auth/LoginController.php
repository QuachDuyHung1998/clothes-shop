<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => __('Email can not be blank'),
                'email.email' => __('Email format is not correct'),
                'password.required' => __('Password can not be blank'),
            ]
        );

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('error', __('Invalid login details'));
        }

        if (auth()->user() && auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('site.home');
    }
}