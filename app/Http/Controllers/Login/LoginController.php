<?php

namespace App\Http\Controllers\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function index()
    {
        return view('login.index');   
    }

    public function store(Request $request)
    {
        if (!Auth::attempt($request->all())) {
            return redirect()->back()->withErrors('Usuário ou senha inválidos');
        }

        return to_route('series.index');
    }
}
