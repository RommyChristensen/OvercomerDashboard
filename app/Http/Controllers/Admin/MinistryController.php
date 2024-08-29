<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ministry;
use App\Success;
use DateTime;
use Illuminate\Http\Request;

class MinistryController extends Controller
{
    public function view(){
        $data = Ministry::all()->map(function($min, $key) {
            $min = array(
                'ministry_name' => $min->ministry_name,
                'ministry_description' => $min->ministry_description,
                'ministry_id' => $min->ministry_id
            );
            return (object) $min;
        });
        return view('pages.admin.master_ministry', ['ministries' => $data]);
    }

    public function add(Request $request) {
        $data = $request->validate([
            'ministry_name' => 'required',
            'ministry_description' => 'required',
        ]);

        Ministry::create([
            'ministry_name' => $data['ministry_name'],
            'ministry_description' => $data['ministry_description']
        ]);

        return redirect()->back()->with(Success::GENERAL_SUCCESS, Success::GENERAL_SUCCESS_MESSAGE);
    }
}