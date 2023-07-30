<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CGroups;
use App\Success;
use DateTime;
use Illuminate\Http\Request;

class CGController extends Controller
{
    public function view(){
        // TODO: QUERY WITH FILTERS
        $data = CGroups::all()->map(function($cg, $key) {
            $dates = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            $status = "Onsite";
            $day = $dates[(int) $cg->connect_group_day];
            if($cg->connect_group_status == "1"){
                $status = "Online";
            } elseif ($cg->connect_group_status == "2"){
                $status = "Hybrid";
            }
            $cg = array(
                'cg_status' => $status,
                'cg_day' => $day,
                'cg_time' => $cg->connect_group_time,
                'cg_location' => $cg->connect_group_location,
                'cg_number' => $cg->connect_group_number
            );
            return (object) $cg;
        });
        return view('pages.admin.master_connect_group', ['connect_groups' => $data]);
    }

    public function add(Request $request) {
        $data = $request->validate([
            'cg_number' => 'required|numeric',
            'cg_status' => 'required',
            'cg_day' => 'required|numeric',
            'cg_time' => 'required',
            'cg_location' => 'required',
        ]);

        CGroups::create([
            'connect_group_number' => $data['cg_number'],
            'connect_group_status' => $data['cg_status'],
            'connect_group_time' => $this->convertToStandardTime($data['cg_time']),
            'connect_group_day' => $data['cg_day'],
            'connect_group_location' => $data['cg_location'],
        ]);

        return redirect()->back()->with(Success::GENERAL_SUCCESS, Success::GENERAL_SUCCESS_MESSAGE);
    }
    
    private function convertToStandardTime($timeStr) {
        $timeObj = DateTime::createFromFormat('g:i A', $timeStr);
        if ($timeObj === false) {
            return "Invalid time format. Please use the format '6:45 PM'.";
        }
        
        return $timeObj->format('H:i');
    }
}
