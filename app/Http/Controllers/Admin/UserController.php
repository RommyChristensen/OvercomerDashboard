<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Success;
use DateTime;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view(){
        // TODO: QUERY WITH FILTERS
        $role_name = "CGL";
        $data = User::all()->map(function($users, $key) {
            $users = array(
                'username' => $users->username,
                'fullname' => $users->fullname,
                'user_role' => "CGL"
            );
            return (object) $users;
        });
        return view('pages.admin.master_user', ['users' => $data]);
    }
}