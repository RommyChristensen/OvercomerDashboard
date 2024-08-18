<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CGroups;
use App\Models\Member;
use App\Models\MemberCGroup;
use App\Models\MemberMinistry;
use App\Models\Ministry;
use App\Models\Role;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function view(){
        $role = Role::all();
        $members = Member::with('connect_group')->with('ministries')->get();

        return view('pages.admin.view_members', ['roles' => $role, 'members' => $members]);
    }

    public function view_add(){
        $cgs = CGroups::all();
        $role = Role::all();
        $ministries = Ministry::all();

        return view('pages.admin.add_member', ['roles' => $role, 'cg' => $cgs, 'ministries' => $ministries]);
    }

    public function add(Request $req){
        $req->validate([
            "nij" => 'required|numeric',
            "connect_group" => 'required',
            "full_name" => 'required',
            "role" => 'required',
            "status" => 'required',
            "email" => 'required|email'
        ]);

        $member_data = array();
        $data = $req->all();

        $member_data['member_nij'] = $data['nij'];
        $member_data['role_id'] = $data['role'];
        $member_data['member_fullname'] = $data['full_name'];
        $member_data['member_email'] = $data['email'];
        $member_data['member_is_active'] = $data['status'];
        $this->checkAndAssignDataValidation($member_data, 'member_believe_jesus', $data, 'cb_5m_py', "1");
        $this->checkAndAssignDataValidation($member_data, 'member_water_baptism', $data, 'cb_5m_rk', "1");
        $this->checkAndAssignDataValidation($member_data, 'member_spirit_baptism', $data, 'cb_5m_bps', "1");
        $this->checkAndAssignDataValidation($member_data, 'member_cg_routine', $data, 'cb_5m_rcg', "1");
        $this->checkAndAssignDataValidation($member_data, 'member_aog_routine', $data, 'cb_5m_rib', "1");
        $this->checkAndAssignDataValidation($member_data, 'member_cgt_1', $data, 'cb_class_cgt1', "1");
        $this->checkAndAssignDataValidation($member_data, 'member_cgt_2', $data, 'cb_class_cgt2', "1");
        $this->checkAndAssignDataValidation($member_data, 'member_cgt_3', $data, 'cb_class_cgt3', "1");
        $this->checkAndAssignDataValidation($member_data, 'member_msj_1', $data, 'cb_class_msj1', "1");
        $this->checkAndAssignDataValidation($member_data, 'member_msj_2', $data, 'cb_class_msj2', "1");
        $this->checkAndAssignDataValidation($member_data, 'member_msj_3', $data, 'cb_class_msj3', "1");
        $this->checkAndAssignDataValidation($member_data, 'member_birth_place', $data, 'birth_place');
        $this->checkAndAssignDataValidation($member_data, 'member_birth_date', $data, 'birth_date', $this->formatDate($data['birth_date']));
        $this->checkAndAssignDataValidation($member_data, 'member_address', $data, 'address');
        $this->checkAndAssignDataValidation($member_data, 'member_phone', $data, 'phone');
        $this->checkAndAssignDataValidation($member_data, 'member_status', $data, 'occupation');
        if(isset($member_data['member_status']) && $member_data['member_status'] == '1'){
            $this->checkAndAssignDataValidation($member_data, 'member_campus', $data, 'occupation_remark');
        }else if(isset($member_data['member_status']) && $member_data['member_status'] == '0') {
            $this->checkAndAssignDataValidation($member_data, 'member_company', $data, 'occupation_remark');
        }
        $this->checkAndAssignDataValidation($member_data, 'member_target_member', $data, 'target_member', $this->formatDate($data['target_member']));
        $this->checkAndAssignDataValidation($member_data, 'member_target_cgl', $data, 'target_cgl', $this->formatDate($data['target_cgl']));
        $this->checkAndAssignDataValidation($member_data, 'member_target_coach', $data, 'target_coach', $this->formatDate($data['target_coach']));
        $this->checkAndAssignDataValidation($member_data, 'member_other_remarks', $data, 'other_notes');

        $member = Member::create($member_data);

        $member_cg = array();
        $member_cg['connect_group_id'] = $data['connect_group'];
        $member_cg['member_id'] = $member->member_id;
        $member_cg['member_connect_group_date_start'] = date_format(date_create('now'), 'Y-m-d');
        MemberCGroup::create($member_cg);

        $member_ministry = array();
        $member_ministry['member_id'] = $member->member_id;
        $member_ministry['ministry_id'] = $data['ministry'];
        $member_ministry['member_ministry_remarks'] = $data['ministry_remark'];
        $member_ministry['member_ministry_date_start'] = date_format(date_create('now'), 'Y-m-d');
        MemberMinistry::create($member_ministry);

        return redirect()->back();
    }

    private function checkAndAssignDataValidation(&$arr, $key, $arr2, $key2, $customval=null) {
        if(array_key_exists($key2, $arr2)){
            $arr[$key] = $customval != null ? $customval : $arr2[$key2];
        }
    }

    private function formatDate($val){
        return date_format(date_create($val), 'Y-m-d');
    }

    public function view_edit(Member $member) {
        $cgs = CGroups::all();
        $role = Role::all();
        $ministries = Ministry::all();

        return view('pages.admin.add_member', [
            'member' => $member,
            'edit_mode' => true,
            'roles' => $role,
            'cg' => $cgs,
            'ministries' => $ministries
        ]);

        /*
            1 Member -> 1 CG
            1 CG -> X Member
            Member -> CG
            Many to One
        */
    }
}
