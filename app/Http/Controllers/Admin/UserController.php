<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Success;
use DateTime;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view(){
        // TODO: QUERY WITH FILTERS
        $data = User::all()->map(function($users, $key) {
            $users = array(
                'cg_status' => $status,
                'cg_day' => $day,
                'cg_time' => $users->connect_group_time,
                'cg_location' => $users->connect_group_location,
                'cg_number' => $users->connect_group_number,
                'user_id' => $users->connect_group_id
            );
            return (object) $users;
        });
        return view('pages.admin.master_user', ['users' => $data]);
    }
}