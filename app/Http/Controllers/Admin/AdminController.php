<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $req) {
        // $validatedReq = $req->validate([
        //     'username' => 'required',
        //     'password' => 'required'
        // ]);

        // $credentials = array(
        //     'username' => $req->input('username'),
        //     'password' => $req->input('password')
        // );

        // if(Auth::attempt($credentials)){
        //     return 'success';
        // }

        return redirect()->route("admin.view_user");

        // echo $req->input('username');
        // echo $req->input('password');
    }
}
