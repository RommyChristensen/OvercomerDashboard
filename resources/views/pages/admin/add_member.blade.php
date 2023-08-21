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
                                    <div class="col-md-6">
                                        <div class="form-group">
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
                                            @error('nij')
                                                <span id="input-nij-error" class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Connect Group</label>
                                            <select class="form-control select2" style="width: 100%;" name="connect_group">
                                                @foreach ($cg as $c)
                                                    <option value="{{$c['connect_group_id']}}">CG {{ $c['connect_group_number'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputFullNameMember">Full Name</label>
                                            <input type="text"
                                            class="
                                                form-control
                                                @error('full_name')
                                                    is-invalid
                                                @enderror
                                            "
                                            value="{{ old('full_name') }}"
                                            id="inputFullNameMember" placeholder="Enter Full Name" name="full_name">
                                            @error('full_name')
                                                <span id="input-full_name-error" class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmailMember">Email</label>
                                            <input type="text"
                                            class="
                                                form-control
                                                @error('email')
                                                    is-invalid
                                                @enderror
                                            "
                                            value="{{ old('email') }}"
                                            id="inputEmailMember" placeholder="Enter Email" name="email">
                                            @error('email')
                                                <span id="input-email-error" class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputBirthPlace">Birth Place</label>
                                            <input type="text" class="form-control" id="inputBirthPlace" placeholder="Enter Birth Place" name="birth_place">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Birth Date</label>
                                            <div class="input-group date" id="birthdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="birth_date"
                                                    data-target="#birthdate" />
                                                <div class="input-group-append" data-target="#birthdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control select2" style="width: 100%;" name="role">
                                                @foreach ($roles as $r)
                                                    @if ($r['role_id'] > 1)
                                                        <option value="{{$r['role_id']}}">{{ $r['role_name'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2" style="width: 100%;" name="status">
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddressMember">Full Address</label>
                                            <input type="text" class="form-control" id="inputAddressMember" placeholder="Enter Full Address" name="address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputPhoneMember">Phone Number</label>
                                            <input type="number" class="form-control" id="inputPhoneMember" placeholder="Enter Phone Number" name="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Occupation</label>
                                            <select class="form-control select2" style="width: 100%;" name="occupation">
                                                <option value="0">Worker</option>
                                                <option value="1">Student</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputOccupationPlace">Place of work / University (generate tergantung kolom occupation)</label>
                                            <input type="text" class="form-control" id="inputOccupationPlace" placeholder="Enter Place of Work / University" name="occupation_remark">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="callout">
                                            <h5 clas="mb-1"><b>5M</b></h5>
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
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="callout">
                                            <h5 clas="mb-1"><b>CGT & MSJ</b></h5>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ministry</label>
                                            <select class="form-control select2" style="width: 100%;" name="ministry">
                                                @foreach ($ministries as $m)
                                                    <option value="{{$m['ministry_id']}}">{{ $m['ministry_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputMinistryRemark">Remark</label>
                                            <input type="text" class="form-control" id="inputMinistryRemark" placeholder="Ministry Remark" name="ministry_remark">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Target Member</label>
                                            <div class="input-group date" id="targetmember" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="target_member"
                                                    data-target="#targetmember" />
                                                <div class="input-group-append" data-target="#targetmember"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Target CGL</label>
                                            <div class="input-group date" id="targetcgl" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="target_cgl"
                                                    data-target="#targetcgl" />
                                                <div class="input-group-append" data-target="#targetcgl"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Target Coach</label>
                                            <div class="input-group date" id="targetcoach" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="target_coach"
                                                    data-target="#targetcoach" />
                                                <div class="input-group-append" data-target="#targetcoach"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Other Notes</label>
                                            <textarea class="form-control" rows="3" placeholder="Notes..." name="other_notes"></textarea>
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