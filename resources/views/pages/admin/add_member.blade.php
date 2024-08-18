@extends('components.admin.app')

@section('view_share')
    {{ View::share('nav_active', 'add-member'); }}
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Members</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master Members</li>
                        <li class="breadcrumb-item active">Add Member</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Member</h3>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form method="post" action="{{ route('master_member.add') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row"> 
                                    <div class="col-md-6"> <!-- NIJ -->
                                        <div class="form-group">
                                            @if (isset($edit_mode))
                                                {{-- IF EDIT MODE --}}
                                                <label for="inputNIJMember">NIJ</label>
                                                <input type="text" name="nij"
                                                    class="
                                                        form-control
                                                        @error('nij')
                                                            is-invalid
                                                        @enderror
                                                    "
                                                    value="{{ $member->member_nij }}"
                                                    id="inputNIJMember" placeholder="Enter NIJ">
                                            @else
                                                {{-- IF ADD MODE --}}
                                                <label for="inputNIJMember">NIJ</label>
                                                <input type="text" name="nij"
                                                    class="
                                                        form-control
                                                        @error('nij')
                                                            is-invalid
                                                        @enderror
                                                    "
                                                    value="{{ old('nij') }}"
                                                    id="inputNIJMember" placeholder="Enter username">
                                            @endif
                                            @error('nij')
                                                <span id="input-nij-error" class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <!-- CONNECT GROUP -->
                                        <div class="form-group">
                                            <label>Connect Group</label>
                                            <select class="form-control select2" style="width: 100%;" name="connect_group">
                                                @if (isset($edit_mode))
                                                    @isset($cg)
                                                        @foreach ($cg as $c)
                                                            <option value="{{$c['connect_group_id']}}"
                                                                @if ($member->connect_group->connect_group_number == $c['connect_group_number'])
                                                                    selected
                                                                @endif
                                                            >CG {{ $c['connect_group_number'] }}</option>
                                                        @endforeach
                                                    @endisset
                                                @else
                                                    @isset($cg)
                                                        @foreach ($cg as $c)
                                                            <option value="{{$c['connect_group_id']}}">CG {{ $c['connect_group_number'] }}</option>
                                                        @endforeach
                                                    @endisset
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> <!-- FULL NAME -->
                                        <div class="form-group">
                                            <label for="inputFullNameMember">Full Name</label>

                                            @if (isset($edit_mode))
                                                <input type="text"
                                                class="
                                                    form-control
                                                    @error('full_name')
                                                        is-invalid
                                                    @enderror
                                                "
                                                value="{{ $member->member_fullname }}"
                                                id="inputFullNameMember" placeholder="Enter Full Name" name="full_name">
                                            @else
                                                <input type="text"
                                                class="
                                                    form-control
                                                    @error('full_name')
                                                        is-invalid
                                                    @enderror
                                                "
                                                value="{{ old('full_name') }}"
                                                id="inputFullNameMember" placeholder="Enter Full Name" name="full_name">
                                            @endif
                                            @error('full_name')
                                                <span id="input-full-name-error" class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <!-- EMAIL -->
                                        <div class="form-group">
                                            <label for="inputEmailMember">Email</label>

                                            @if(isset($edit_mode))
                                                <input type="text"
                                                class="
                                                    form-control
                                                    @error('email')
                                                        is-invalid
                                                    @enderror
                                                "
                                                value="{{ $member->member_email }}"
                                                id="inputEmailMember" placeholder="Enter Email" name="email">
                                            @else
                                                <input type="text"
                                                class="
                                                    form-control
                                                    @error('email')
                                                        is-invalid
                                                    @enderror
                                                "
                                                value="{{ old('email') }}"
                                                id="inputEmailMember" placeholder="Enter Email" name="email">
                                            @endif
                                            
                                            @error('email')
                                                <span id="input-email-error" class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> <!-- BIRTH PLACE -->
                                        <div class="form-group">
                                            <label for="inputBirthPlace">Birth Place</label>
                                            @if(isset($edit_mode))
                                                <input type="text" class="
                                                    form-control
                                                    @error('birth_place')
                                                        is-invalid
                                                    @enderror
                                                "
                                                value="{{ $member->member_birth_place }}"
                                                id="inputBirthPlace" placeholder="Enter Birth Place" name="birth_place">
                                            @else
                                                <input type="text" class="
                                                    form-control
                                                    @error('birth_place')
                                                        is-invalid
                                                    @enderror
                                                "
                                                value="{{ old('birth_place') }}"
                                                id="inputBirthPlace" placeholder="Enter Birth Place" name="birth_place">
                                            @endif
                                            
                                            @error('birth_place')
                                                <span id="input-birth-place-error" class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <!-- BIRTH DATE -->
                                        <div class="form-group">
                                            <label>Birth Date</label>

                                            @if(isset($edit_mode))
                                                <div class="input-group date" id="birthdate" data-target-input="nearest">
                                                    <input type="text" class="
                                                        form-control datetimepicker-input
                                                        @error('birth_date')
                                                            is-invalid
                                                        @enderror
                                                    "
                                                    value="{{ date_format(date_create($member->member_birth_date), 'm/d/Y') }}"
                                                    name="birth_date"
                                                        data-target="#birthdate" />
                                                    <div class="input-group-append" data-target="#birthdate"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="input-group date" id="birthdate" data-target-input="nearest">
                                                    <input type="text" class="
                                                        form-control datetimepicker-input
                                                        @error('birth_date')
                                                            is-invalid
                                                        @enderror
                                                    "
                                                    value="{{ old('birth_date') }}"
                                                    name="birth_date"
                                                        data-target="#birthdate" />
                                                    <div class="input-group-append" data-target="#birthdate"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            @endif
                                            @error('birth_date')
                                                <span id="input-birth-date-error" class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> <!-- ROLE -->
                                        <div class="form-group">
                                            <label>Role</label>
                                            @if (isset($edit_mode))
                                                <select class="form-control select2" style="width: 100%;" name="role">
                                                    @isset($roles)
                                                        @foreach ($roles as $r)
                                                            @if ($r['role_id'] > 1)
                                                                <option value="{{$r['role_id']}}"
                                                                    @if ($member->role_id == $r['role_id'])
                                                                        selected
                                                                    @endif
                                                                >{{ $r['role_name'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            @else
                                                <select class="form-control select2" style="width: 100%;" name="role">
                                                    @isset($roles)
                                                        @foreach ($roles as $r)
                                                            @if ($r['role_id'] > 1)
                                                                <option value="{{$r['role_id']}}">{{ $r['role_name'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <!-- STATUS -->
                                        <div class="form-group">
                                            <label>Status</label>

                                            @if(isset($edit_mode))
                                                <select class="form-control select2" style="width: 100%;" name="status">
                                                    <option value="0"
                                                        @if($member->member_is_active == '0') selected @endif
                                                    >Inactive</option>
                                                    <option value="1"
                                                        @if($member->member_is_active == '1') selected @endif
                                                    >Active</option>
                                                </select>
                                            @else
                                                <select class="form-control select2" style="width: 100%;" name="status">
                                                    <option value="0">Active</option>
                                                    <option value="1">Inactive</option>
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> <!-- FULL ADDRESS -->
                                        <div class="form-group">
                                            <label for="inputAddressMember">Full Address</label>
                                            @if(isset($edit_mode))
                                                <input type="text"
                                                value="{{ $member->member_address }}"
                                                class="form-control" id="inputAddressMember" placeholder="Enter Full Address" name="address">
                                            @else
                                                <input type="text" class="form-control" id="inputAddressMember" placeholder="Enter Full Address" name="address">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <!-- PHONE NUMBER -->
                                        <div class="form-group">
                                            <label for="inputPhoneMember">Phone Number</label>
                                            @if(isset($edit_mode))
                                                <input type="number"
                                                value="{{ $member->member_phone }}"
                                                class="form-control" id="inputPhoneMember" placeholder="Enter Phone Number" name="phone">
                                            @else
                                                <input type="number" class="form-control" id="inputPhoneMember" placeholder="Enter Phone Number" name="phone">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> <!-- OCCUPATION -->
                                        <div class="form-group">
                                            <label>Occupation</label>
                                            @if(isset($edit_mode))
                                                <select class="form-control select2" style="width: 100%;" name="occupation">
                                                    <option value="0"
                                                        @if($member->member_status == '0') selected @endif
                                                    >Worker</option>
                                                    <option value="1"
                                                        @if($member->member_status == '1') selected @endif
                                                    >Student</option>
                                                </select>
                                            @else
                                                <select class="form-control select2" style="width: 100%;" name="occupation">
                                                    <option value="0">Worker</option>
                                                    <option value="1">Student</option>
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <!-- PLACE OF WORK / UNIVERSITY -->
                                        <div class="form-group">
                                            <label for="inputOccupationPlace">Place of work / University (generate tergantung kolom occupation)</label>
                                            @if(isset($edit_mode))
                                                <input type="text"
                                                    @if($member->member_status == '1')
                                                        value="{{ $member->member_campus }}"
                                                    @else
                                                        value="{{ $member->member_company }}"
                                                    @endif
                                                class="form-control" id="inputOccupationPlace" placeholder="Enter Place of Work / University" name="occupation_remark">
                                            @else
                                                <input type="text" class="form-control" id="inputOccupationPlace" placeholder="Enter Place of Work / University" name="occupation_remark">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"> <!-- 5M -->
                                        <div class="callout">
                                            <h5 clas="mb-1"><b>5M</b></h5>
                                            @if (isset($edit_mode))
                                                <div class="icheck-primary">
                                                    <input type="checkbox"
                                                        @if ($member->member_believe_jesus == '1')
                                                            checked
                                                        @endif
                                                    id="checkboxPY" name="cb_5m_py">
                                                    <label for="checkboxPY">
                                                        Percaya Yesus
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox"
                                                        @if ($member->member_spirit_baptism == '1')
                                                            checked
                                                        @endif
                                                    id="checkboxBRK" name="cb_5m_rk">
                                                    <label for="checkboxBRK">
                                                        Baptisan Roh Kudus
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox"
                                                        @if ($member->member_water_baptism == '1')
                                                            checked
                                                        @endif
                                                    id="checkboxBPS" name="cb_5m_bps">
                                                    <label for="checkboxBPS">
                                                        Baptisan Selam
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox"
                                                        @if ($member->member_cg_routine == '1')
                                                            checked
                                                        @endif
                                                    id="checkboxRCG" name="cb_5m_rcg">
                                                    <label for="checkboxRCG">
                                                        Rutin CG
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox"
                                                        @if ($member->member_aog_routine == '1')
                                                            checked
                                                        @endif
                                                    id="checkboxRIB" name="cb_5m_rib">
                                                    <label for="checkboxRIB">
                                                        Rutin Ibadah
                                                    </label>
                                                </div>
                                                <div class="icheck-primary" style="visibility: hidden">
                                                    <input type="checkbox" id="checkboxempty">
                                                    <label for="checkboxempty">
        
                                                    </label>
                                                </div>
                                            @else
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="checkboxPY" name="cb_5m_py">
                                                    <label for="checkboxPY">
                                                        Percaya Yesus
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="checkboxBRK" name="cb_5m_rk">
                                                    <label for="checkboxBRK">
                                                        Baptisan Roh Kudus
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="checkboxBPS" name="cb_5m_bps">
                                                    <label for="checkboxBPS">
                                                        Baptisan Selam
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="checkboxRCG" name="cb_5m_rcg">
                                                    <label for="checkboxRCG">
                                                        Rutin CG
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="checkboxRIB" name="cb_5m_rib">
                                                    <label for="checkboxRIB">
                                                        Rutin Ibadah
                                                    </label>
                                                </div>
                                                <div class="icheck-primary" style="visibility: hidden">
                                                    <input type="checkbox" id="checkboxempty">
                                                    <label for="checkboxempty">
        
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <!-- CGT & MSJ -->
                                        <div class="callout">
                                            <h5 clas="mb-1"><b>CGT & MSJ</b></h5>
                                            @if (isset($edit_mode))
                                                <div class="icheck-primary">
                                                    <input type="checkbox" 
                                                        @if ($member->member_cgt_1)
                                                            checked
                                                        @endif
                                                    id="checkboxCGT1" name="cb_class_cgt1">
                                                    <label for="checkboxCGT1">
                                                        CGT 1
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox"
                                                        @if ($member->member_cgt_2)
                                                            checked
                                                        @endif
                                                    id="checkboxCGT2" name="cb_class_cgt2">
                                                    <label for="checkboxCGT2">
                                                        CGT 2
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox"
                                                        @if ($member->member_cgt_3)
                                                            checked
                                                        @endif
                                                    id="checkboxCGT3" name="cb_class_cgt3">
                                                    <label for="checkboxCGT3">
                                                        CGT 3
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox"
                                                        @if ($member->member_msj_1)
                                                            checked
                                                        @endif
                                                    id="checkboxMSJ1" name="cb_class_msj1">
                                                    <label for="checkboxMSJ1">
                                                        MSJ 1
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox"
                                                        @if ($member->member_msj_2)
                                                            checked
                                                        @endif
                                                    id="checkboxMSJ2" name="cb_class_msj2">
                                                    <label for="checkboxMSJ2">
                                                        MSJ 2
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox"
                                                        @if ($member->member_msj_3)
                                                            checked
                                                        @endif
                                                    id="checkboxMSJ3" name="cb_class_msj3">
                                                    <label for="checkboxMSJ3">
                                                        MSJ 3
                                                    </label>
                                                </div>
                                            @else
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="checkboxCGT1" name="cb_class_cgt1">
                                                    <label for="checkboxCGT1">
                                                        CGT 1
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="checkboxCGT2" name="cb_class_cgt2">
                                                    <label for="checkboxCGT2">
                                                        CGT 2
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="checkboxCGT3" name="cb_class_cgt3">
                                                    <label for="checkboxCGT3">
                                                        CGT 3
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="checkboxMSJ1" name="cb_class_msj1">
                                                    <label for="checkboxMSJ1">
                                                        MSJ 1
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="checkboxMSJ2" name="cb_class_msj2">
                                                    <label for="checkboxMSJ2">
                                                        MSJ 2
                                                    </label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="checkboxMSJ3" name="cb_class_msj3">
                                                    <label for="checkboxMSJ3">
                                                        MSJ 3
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> <!-- MINISTRIES -->
                                        <div class="form-group">
                                            {{-- TODO: FIX MINISTRY MULTI MINISTRY --}}
                                            <label>Ministry</label>
                                            <select class="form-control select2" style="width: 100%;" name="ministry">
                                                @isset($ministries)
                                                    @foreach ($ministries as $m)
                                                        <option value="{{$m['ministry_id']}}">{{ $m['ministry_name'] }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <!-- MINISTRY REMARKS -->
                                        <div class="form-group">
                                            <label for="inputMinistryRemark">Remark</label>
                                            <input type="text" class="form-control" id="inputMinistryRemark" placeholder="Ministry Remark" name="ministry_remark">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"> <!-- TARGET MEMBER -->
                                        <div class="form-group">
                                            <label>Target Member</label>
                                            @if(isset($edit_mode))
                                                <div class="input-group date" id="targetmember" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input"
                                                    value="{{ date_format(date_create($member->member_target_member), 'm/d/Y') }}"
                                                    name="target_member"
                                                        data-target="#targetmember" />
                                                    <div class="input-group-append" data-target="#targetmember"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="input-group date" id="targetmember" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" name="target_member"
                                                        data-target="#targetmember" />
                                                    <div class="input-group-append" data-target="#targetmember"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4"> <!-- TARGET CGL -->
                                        <div class="form-group">
                                            <label>Target CGL</label>
                                            @if(isset($edit_mode))
                                                <div class="input-group date" id="targetcgl" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input"
                                                    value="{{ date_format(date_create($member->member_target_cgl), 'm/d/Y') }}"
                                                    name="target_cgl"
                                                        data-target="#targetcgl" />
                                                    <div class="input-group-append" data-target="#targetcgl"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="input-group date" id="targetcgl" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" name="target_cgl"
                                                        data-target="#targetcgl" />
                                                    <div class="input-group-append" data-target="#targetcgl"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4"> <!-- TARGET COACH -->
                                        <div class="form-group">
                                            <label>Target Coach</label>
                                            @if(isset($edit_mode))
                                                <div class="input-group date" id="targetcoach" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input"
                                                    value="{{ date_format(date_create($member->member_target_coach), 'm/d/Y') }}"
                                                    name="target_coach"
                                                        data-target="#targetcoach" />
                                                    <div class="input-group-append" data-target="#targetcoach"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="input-group date" id="targetcoach" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" name="target_coach"
                                                        data-target="#targetcoach" />
                                                    <div class="input-group-append" data-target="#targetcoach"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> <!-- OTHER REMARKS -->
                                        <div class="form-group">
                                            <label>Other Notes</label>
                                            @if(isset($edit_mode))
                                                <textarea class="form-control" rows="3" placeholder="Notes..." name="other_notes">{{ $member->member_other_remarks }}</textarea>
                                            @else
                                                <textarea class="form-control" rows="3" placeholder="Notes..." name="other_notes"></textarea>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success btn-sm">Add&nbsp;&nbsp;<i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('add_on_scripts')
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        $('#targetmember, #targetcgl, #targetcoach, #birthdate').datetimepicker({
            format: 'L'
        });
    });
</script>
@endsection