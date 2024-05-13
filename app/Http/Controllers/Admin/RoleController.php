<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function add() {

    }

    public function view(){
        // $data = CGroups::all()->map(function($cg, $key) {
        //     $dates = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        //     $status = "Onsite";
        //     $day = $dates[(int) $cg->connect_group_day];
        //     if($cg->connect_group_status == "1"){
        //         $status = "Online";
        //     } elseif ($cg->connect_group_status == "2"){
        //         $status = "Hybrid";
        //     }
        //     $cg = array(
        //         'cg_status' => $status,
        //         'cg_day' => $day,
        //         'cg_time' => $cg->connect_group_time,
        //         'cg_location' => $cg->connect_group_location,
        //         'cg_number' => $cg->connect_group_number,
        //         'cg_id' => $cg->connect_group_id
        //     );
        //     return (object) $cg;
        // });
        // return view('pages.admin.master_connect_group', ['connect_groups' => $data]);
    }
}
