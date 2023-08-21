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
                    <input type="hidden" name="cg_id" id="inputCGId">
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
                                <input type="text" name="user_uname" 
                                class="
                                    form-control
                                    @error('user_uname')
                                        is-invalid
                                    @enderror
                                " 
                                id="inputUsernameUser" placeholder="Enter username">
                                @error('user_uname')
                                    <span id="input-cg_location-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputFullNameUser">Full Name</label>
                                <input type="text" class="form-control" id="inputFullNameUser" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label>Assign To (ini generate otomatis utk member yg belum punya akun)</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option value="1">Member 1 - CGL</option>
                                    <option value="2">Member 2 - CGL</option>
                                    <option value="3">Member 3 - CGL</option>
                                    <option value="4">Member 4 - Sponsor</option>
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
                                        <th>User Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>rommy123</td>
                                        <td>Rommy Christensen</td>
                                        <td>Sponsor</td>
                                        <td>
                                            <button class="btn btn-xs btn-info"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>rommy123</td>
                                        <td>Rommy Christensen</td>
                                        <td>Sponsor</td>
                                        <td>
                                            <button class="btn btn-xs btn-info"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>rommy123</td>
                                        <td>Rommy Christensen</td>
                                        <td>Administrator</td>
                                        <td>
                                            <button class="btn btn-xs btn-info"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>User Role</th>
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
        $('.select2').select2()
    });
</script>
@endsection
