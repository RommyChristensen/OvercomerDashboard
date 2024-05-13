<?php

namespace App\Http\Controllers\Admin;

use App\Errors;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Success;
use Error;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function add(Request $request) {
        $data = $request->validate([
            'role_name' => 'required',
        ]);

        Role::create([
            'role_name' => $data['role_name']
        ]);

        return redirect()->back()->with(Success::GENERAL_SUCCESS, Success::GENERAL_SUCCESS_MESSAGE);
    }

    public function view(){
        $data = Role::all();

        return view('pages.admin.master_roles', ['roles' => $data]);
    }

    public function destroyById(Request $request){
        $data = $request->validate([
            'role_id' => 'required'
        ]);

        try {
            Role::where('role_id', $data['role_id'])->delete();
        } catch (Exception $ex) {
            return redirect()->back()->with(Errors::GENERAL_FAILED_KEY, Errors::GENERAL_FAILED_ERROR_MESSAGE);
        }

        return redirect()->back()->with(Success::GENERAL_SUCCESS, Success::GENERAL_SUCCESS_MESSAGE); 
    }

    public function update(Request $request, $id) {

    }
}
