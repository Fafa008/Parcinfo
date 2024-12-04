<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function logout(){
        Auth::logout();
        return redirect(route('auth.login'));
    }
    public function doLogin(LoginRequest $requete){
        $credentlist = $requete->validated();

        if(Auth::attempt($credentlist)){
            $requete->session()->regenerate();
            return redirect()->intended(route('Projet.index'));
        }

        return redirect(route('auth.login'))->withErrors([
            'email' => "email invalide"
            ])->onlyInput('email');
    }
}
