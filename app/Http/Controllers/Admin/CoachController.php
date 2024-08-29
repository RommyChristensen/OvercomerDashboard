<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CGroups;
use App\Models\Coach;
use App\Models\Member;
use App\Success;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function view() {
        $coach = Coach::select('member_id')->get();
        $members = Member::whereNotIn('member_id', $coach)->where('role_id', '3')->get();
        $coaches = Coach::all();
        $connect_groups = CGroups::where('coach_id', NULL)->get();

        return view('pages.admin.master_coaches', ['members' => $members, 'coaches' => $coaches, 'connect_groups' => $connect_groups]);
    }

    public function add(Request $req) {
        $dataValidated = $req->validate([
            'coach_name' => 'required',
            'member_id' => 'required'
        ]);

        $coach = new Coach();
        $coach->member_id = $dataValidated['member_id'];
        $coach->coach_name = $dataValidated['coach_name'];
        $coach->save();

        if(isset($req->connect_groups) && count($req->connect_groups) > 0) {
            foreach($req->connect_groups as $cg) {
                $cg = CGroups::find($cg);
                $cg->coach_id = $coach->coach_id;
                $cg->save();
            }
        }

        return redirect()->back()->with(Success::GENERAL_SUCCESS, 'Success add new Coach');
    }

    public function get_by_id(Request $req) {
        $coachId = $req->coach_id;
        $coach = Coach::with('connect_groups')->with('member')->where('coach_id', $coachId)->get();

        return $coach;
    }

    public function edit(Request $req) {
        $coach = Coach::find($req['coach_id']);
        $coach->coach_name = $req['coach_name'];
        $coach->save();

        if(isset($req->connect_groups) && count($req->connect_groups) > 0) {
            CGroups::where('coach_id', $req['coach_id'])->update(['coach_id' => NULL]);
            foreach($req->connect_groups as $cg) {
                $cg = CGroups::find($cg);
                $cg->coach_id = $coach->coach_id;
                $cg->save();
            }
        }

        return redirect()->back()->with(Success::GENERAL_SUCCESS, 'Success edit Coach');
    }

    public function delete(Request $req) {
        CGroups::where('coach_id', $req['coach_id'])->update(['coach_id' => NULL]);
        Coach::find($req['coach_id'])->delete();
        return "Success delete Coach";
    }
}
