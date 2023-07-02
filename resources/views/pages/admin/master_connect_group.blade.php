@extends('components.admin.app')

@section('view_share')
    {{ View::share('nav_active', 'view-connect-groups'); }}
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Connect Groups</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master Connect Groups</li>
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
                            <h3 class="card-title">Add Connect Group</h3>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputCGNumber">CG Number</label>
                                <input type="number" class="form-control" id="inputCGNumber" placeholder="Enter CG Number">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option value="0">Non Active</option>
                                    <option value="1" selected>Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Day</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option value="0">Sunday</option>
                                    <option value="1">Monday</option>
                                    <option value="2">Tuesday</option>
                                    <option value="3">Wednesday</option>
                                    <option value="4">Thursday</option>
                                    <option value="5">Friday</option>
                                    <option value="6">Saturday</option>
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="inputCGTime">Time</label>
                                <input type="text" class="form-control" id="inputCGTime" placeholder="Enter CG Time">
                            </div> --}}
                            <div class="form-group">
                                <label>CG Time</label>
                                <div class="input-group date" id="inputCGTime" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#inputCGTime" placeholder="Enter CG Time" />
                                    <div class="input-group-append" data-target="#inputCGTime"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputLocation">Location</label>
                                <input type="text" class="form-control" id="inputLocation" placeholder="Enter Location">
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
                            <h3 class="card-title">All Connect Groups</h3>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="cg-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>CG Number</th>
                                        <th>Status</th>
                                        <th>CG Day & Time</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CG 77</td>
                                        <td>Onsite / Online</td>
                                        <td>Sunday, 15.00 PM</td>
                                        <td>Tanjung Duren / - (if online)</td>
                                        <td>
                                            <button class="btn btn-xs btn-info"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CG 77</td>
                                        <td>Onsite / Online</td>
                                        <td>Sunday, 15.00 PM</td>
                                        <td>Tanjung Duren / - (if online)</td>
                                        <td>
                                            <button class="btn btn-xs btn-info"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CG 77</td>
                                        <td>Onsite / Online</td>
                                        <td>Sunday, 15.00 PM</td>
                                        <td>Tanjung Duren / - (if online)</td>
                                        <td>
                                            <button class="btn btn-xs btn-info"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>CG Number</th>
                                        <th>Status</th>
                                        <th>CG Day & Time</th>
                                        <th>Location</th>
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
        $("#cg-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "colvis"]
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#cg-table_wrapper .col-md-6:eq(0)');

        //Initialize Select2 Elements
        $('.select2').select2()
        $('#inputCGTime').datetimepicker({
            format: 'LT'
        });
    });
</script>
@endsection
