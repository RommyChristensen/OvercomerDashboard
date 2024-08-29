<?php

namespace App\Http\Controllers\Admin;

use App\Errors;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use App\Models\Role;
use App\Success;
use DateTime;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function view(){
        $usersRegistered = User::select('member_id')->where('member_id', '<>', '')->get();
        $member = Member::whereNotIn('member_id', $usersRegistered)->get();
        $users = User::with('member')->where('member_id', '<>', '')->get();

        return view('pages.admin.master_user', ['users' => $users, 'membersNotRegistered' => $member]);
    }

    public function add(Request $req) {
        $dataValidated = $req->validate([
            'username' => 'required|unique:users,username',
            'fullname' => 'required',
            'member_id' => 'required'
        ]);

        $user = new User();
        $user->username = $dataValidated['username'];
        $user->fullname = $dataValidated['fullname'];
        $user->password = Hash::make($dataValidated['username'] . '123456');
        $user->member_id = $dataValidated['member_id'];
        $user->save();

        return redirect()->route('admin.view_user')->with(Success::GENERAL_SUCCESS, 'Success make new user');
    }

    public function resetPassword(Request $req) {
        if(!isset($req->user_id)) {
            return redirect()->route('admin.view_user')->with(Errors::GENERAL_FAILED_KEY, 'Cannot Reset Password Member');
        }

        try {
            $user = User::find($req->user_id);
            $user->password = Hash::make($user->username . '123456');
            $user->is_password_default = true;
            $user->save();
            return redirect()->route('admin.view_user')->with(Success::GENERAL_SUCCESS, 'Success Reset Password');
        } catch(Exception $ex) {
            return redirect()->route('admin.view_user')->with(Errors::GENERAL_FAILED_KEY, Errors::GENERAL_FAILED_ERROR_MESSAGE);
        }
    }

    public function destroyById(Request $req) {
        if(!isset($req->user_id)) {
            return redirect()->route('admin.view_user')->with(Errors::GENERAL_FAILED_KEY, 'Cannot Delete Member');
        }

        try {
            $user = User::find($req->user_id);
            $user->delete();
            return redirect()->route('admin.view_user')->with(Success::GENERAL_SUCCESS, 'Success Delete User');
        } catch(Exception $ex) {
            return redirect()->route('admin.view_user')->with(Errors::GENERAL_FAILED_KEY, Errors::GENERAL_FAILED_ERROR_MESSAGE);
        }
    }

    public function viewChangePassword() {
        return view('pages.admin.change_password');
    }

    public function changePassword(Request $req) {
        $dataValidated = $req->validate([
            'password' => 'required|confirmed|alpha_num'
        ]);

        $userLogged = User::where('user_id', Auth::user()->user_id)->first();
        $userLogged->password = Hash::make($dataValidated['password']);
        $userLogged->is_password_default = false;
        $userLogged->save();

        return redirect()->route('admin.dashboard')->with(Success::GENERAL_SUCCESS, 'Password Changed Succesfully');
    }
}