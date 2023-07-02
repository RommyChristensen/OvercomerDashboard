@extends('components.admin.app')

@section('view_share')
    {{ View::share('nav_active', 'view-team-leaders'); }}
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Team Leaders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master Team Leaders</li>
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
                            <h3 class="card-title">Add Team Leader</h3>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputTeamLeaderName">Team Leader Name</label>
                                <input type="text" class="form-control" id="inputTeamLeaderName" placeholder="Enter Team Leader Name">
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
                            <h3 class="card-title">All Roles</h3>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="role-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Team Leader Name</th>
                                        <th>Total Coach</th>
                                        <th>Total Member</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Team Leader Kartini</td>
                                        <td>5</td>
                                        <td>500</td>
                                        <td>
                                            <button class="btn btn-xs btn-info"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Team Leader Mike</td>
                                        <td>5</td>
                                        <td>500</td>
                                        <td>
                                            <button class="btn btn-xs btn-info"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Team Leader Desi</td>
                                        <td>5</td>
                                        <td>500</td>
                                        <td>
                                            <button class="btn btn-xs btn-info"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Team Leader Name</th>
                                        <th>Total Coach</th>
                                        <th>Total Member</th>
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
<script>
    $(function () {
        $("#role-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "colvis"]
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#role-table_wrapper .col-md-6:eq(0)');

        //Initialize Select2 Elements
        $('.select2').select2()
    });
</script>
@endsection
