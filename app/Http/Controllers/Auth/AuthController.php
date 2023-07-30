<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Errors;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $req) {
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = array(
            'username' => $req->input('username'),
            'password' => $req->input('password')
        );

        if(Auth::attempt($credentials)){
            return redirect()->route("admin.view_user");
        }else{
            return redirect()->route('admin.view.login')->withErrors([Errors::LOGIN_AUTH_ERROR_KEY => Errors::LOGIN_AUTH_ERROR_MESSAGE]);
        }
    }
}
