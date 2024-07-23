<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }
    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if ((Auth::attempt($credentials))) {
            $request->session()->regenerate();
            return redirect()->intended(route("hotel.index"));
        }
    }
}
