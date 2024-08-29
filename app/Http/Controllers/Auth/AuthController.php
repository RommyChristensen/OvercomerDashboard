<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Errors;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
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
            $userLogged = User::where('username', $req->username)->with('member')->get();
            if($req->username == 'superadmin') {
                session()->put('user_level', '1');
            } else {
                session()->put('user_level', $userLogged[0]->member->role->role_id);
            }

            $menuSidebar = Menu::with('children')->where('menu_is_sidebar', '1')->where('menu_parent_id', NULL)->orderBy('menu_index', 'asc')->get();

            session()->put(['menus_active' => $menuSidebar]);

            if($userLogged[0]->is_password_default && $req->username != 'superadmin') {
                return redirect()->route('master_user.view_change_password');
            }

            return redirect()->route("admin.view_user");
        }else{
            return redirect()->route('admin.view.login')->withErrors([Errors::LOGIN_AUTH_ERROR_KEY => Errors::LOGIN_AUTH_ERROR_MESSAGE]);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.view.login');
    }
}
