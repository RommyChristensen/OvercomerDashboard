<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use App\Models\Member;
use App\Models\TeamLeader;
use App\Success;
use Illuminate\Http\Request;

class TLController extends Controller
{
    public function view() {
        $tl = TeamLeader::select('member_id')->get();
        $members = Member::whereNotIn('member_id', $tl)->where('role_id', '2')->get();
        $all_tl = TeamLeader::all();
        $coaches = Coach::where('team_leader_id', NULL)->get();

        return view('pages.admin.master_team_leaders', ['members' => $members, 'all_tl' => $all_tl, 'coaches' => $coaches]);
    }

    public function add(Request $req) {
        $dataValidated = $req->validate([
            'tl_name' => 'required',
            'member_id' => 'required'
        ]);

        $tl = new TeamLeader();
        $tl->member_id = $dataValidated['member_id'];
        $tl->team_leader_name = $dataValidated['tl_name'];
        $tl->save();

        if(isset($req->coaches) && count($req->coaches) > 0) {
            foreach($req->coaches as $coach) {
                $c = Coach::find($coach);
                $c->team_leader_id = $tl->tl_id;
                $c->save();
            }
        }

        return redirect()->back()->with(Success::GENERAL_SUCCESS, 'Success add new Team Leader');
    }

    public function get_by_id(Request $req) {
        $tlId = $req->tl_id;
        $tl = TeamLeader::with('coaches')->with('member')->where('tl_id', $tlId)->get();

        return $tl;
    }

    public function edit(Request $req) {
        $tl = TeamLeader::find($req['tl_id']);
        $tl->team_leader_name = $req['tl_name'];
        $tl->save();

        if(isset($req->coaches) && count($req->coaches) > 0) {
            Coach::where('team_leader_id', $req['tl_id'])->update(['team_leader_id' => NULL]);
            foreach($req->coaches as $c) {
                $c = Coach::find($c);
                $c->team_leader_id = $tl->tl_id;
                $c->save();
            }
        }

        return redirect()->back()->with(Success::GENERAL_SUCCESS, 'Success edit Team Leader');
    }

    public function delete(Request $req) {
        Coach::where('team_leader_id', $req['tl_id'])->update(['team_leader_id' => NULL]);
        TeamLeader::find($req['tl_id'])->delete();
        return "Success delete Team Leader";
    }
}
