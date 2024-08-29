@extends('components.admin.app')

@section('view_share')
    {{ View::share('nav_active', 'master-user'); }}
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master User</li>
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
                    <form action="{{ route('master_user.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="member_id" id="inputMemberId">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add User</h3>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputUsernameUser">Username</label>
                                <input type="text" name="username"
                                class="
                                    form-control
                                    @error('username')
                                        is-invalid
                                    @enderror
                                "
                                value="{{ old('username') }}"
                                id="inputUsernameUser" placeholder="Enter Username" name="username">
                                @error('username')
                                    <span id="input-cg_location-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputFullNameUser">Full Name</label>
                                <input type="text" class="
                                    form-control
                                    @error('fullname')
                                        is-invalid
                                    @enderror
                                "
                                value="{{ old('fullname') }}"
                                id="inputFullNameUser" placeholder="Enter Fullname" name="fullname">
                                @error('fullname')
                                    <span id="input-cg_location-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Assign To (ini generate otomatis utk member yg belum punya akun)</label>
                                <select class="form-control select2" style="width: 100%;" name="member_id">
                                    @foreach ($membersNotRegistered as $m)
                                        <option value="{{ $m->member_id }}">{{ $m->member_fullname }} - {{ $m->role->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Add&nbsp;&nbsp;<i class="fas fa-plus"></i></button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Users</h3>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="user-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Member Name</th>
                                        <th>Member Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                        <tr>
                                            <td>{{ $u->username }}</td>
                                            <td>{{ $u->fullname }}</td>
                                            <td>{{ $u->member->member_fullname }}</td>
                                            <td>{{ $u->member->role->role_name }}</td>
                                            <td>
                                                <button class="btn btn-xs btn-info btn-edit" id="btn-reset-pass-{{ $u->user_id }}" @if($u->is_password_default) disabled @endif onclick="editClick({{$u->user_id}})" data-toggle="tooltip" title="Reset Password"><i class="fas fa-repeat"></i></button>
                                                <button class="btn btn-xs btn-danger btn-delete" onclick="deleteClick({{$u->user_id}})" data-toggle="tooltip" title="Delete User '{{ $u->username }}'"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Member Name</th>
                                        <th>Member Role</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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

@if(session()->has(Success::GENERAL_SUCCESS))
    <script>successToast("{{ session()->get(Success::GENERAL_SUCCESS) }}")</script>
@enderror

<script>
    $(function () {
        $("#user-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "colvis"]
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#user-table_wrapper .col-md-6:eq(0)');
        $('#user-table-2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        //Initialize Select2 Elements
        $('.select2').select2();

        $('[data-toggle="tooltip"]').tooltip();
    });

    const deleteClick = id => {
        showConfirmationDialog("Delete Data User", "Are you sure to delete this data?", "warning",
        function() {
            $.ajax({
                method: 'POST',
                url: '{{ URL::URL_USER_DESTROY_BY_ID }}',
                data: {
                    user_id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: res => {
                    console.log(res);
                    successToast('Success Delete User');
                    setTimeout(() => {
                        showLoading(false);
                        reloadPage();
                    }, parseInt(Math.floor(Math.random() * 1000)));
                },
                err: err => {

                    setTimeout(() => {
                        showLoading(false);
                        reloadPage();
                    }, parseInt(Math.floor(Math.random() * 1000)));
                }
            })
        },
        function() { });
    }

    const editClick = id => {
        showLoading(true);
        setTimeout(() => {
            $.ajax({
                method: 'POST',
                url: '{{ URL::URL_USER_RESET_PASSWORD }}',
                data: { 
                    user_id: id,
                    _token: "{{ csrf_token() }}"
                    },
                success: res => {
                    showLoading(false);
                    $("#btn-reset-pass-"+id).attr('disabled', 'true');
                    successToast('Success Reset Password');
                },
                err: err => {
                    showLoading(false);
                }
            })
        }, parseInt(Math.floor(Math.random() * 3000)));
    }
</script>
@endsection
