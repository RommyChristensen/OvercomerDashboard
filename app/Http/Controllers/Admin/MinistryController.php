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
        // TODO: QUERY WITH FILTERS
        $data = Ministry::all()->map(function($min, $key) {
            $min = array(
                'ministry_name' => $min->ministry_name,
                'ministry_description' => $min->ministry_description
            );
            return (object) $min;
        });
        return view('pages.admin.master_ministry', ['ministries' => $data]);
    }
}