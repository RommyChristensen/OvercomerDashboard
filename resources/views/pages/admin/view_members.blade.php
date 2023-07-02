@extends('components.admin.app')

@section('view_share')
    {{ View::share('nav_active', 'view-members'); }}
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
                        <li class="breadcrumb-item active">View Members</li>
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
                            <h3 class="card-title">Summary</h3>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Members</h3>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="member-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NIJ</th>
                                        <th>Connect Group</th>
                                        <th>Full Name</th>
                                        <th>Status</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>CGT & MSJ</th>
                                        <th>5M</th>
                                        <th>Ministry</th>
                                        <th>Notes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10050</td>
                                        <td>CG 77</td>
                                        <td>Rommy Christensen</td>
                                        <td>Aktif</td>
                                        <td>Tanjung Duren</td>
                                        <td>087884914473</td>
                                        <td>
                                            <i class="fas fa-check"></i> CGT 1 <i class="fas fa-check"></i> MSJ 1 <br>
                                            <i class="fas fa-check"></i> CGT 2 <i class="fas fa-check"></i> MSJ 2 <br>
                                            <i class="fas fa-check"></i> CGT 3 <i class="fas fa-check"></i> MSJ 3 <br>
                                        </td>
                                        <td>
                                            <i class="fas fa-check"></i> CGT 1 <i class="fas fa-check"></i> MSJ 1 <br>
                                            <i class="fas fa-check"></i> CGT 2 <i class="fas fa-check"></i> MSJ 2 <br>
                                            <i class="fas fa-check"></i> CGT 3 <i class="fas fa-check"></i> MSJ 3 <br>
                                        </td>
                                        <td>Praise and Worship</td>
                                        <td>Anak ini agak bandel</td>
                                        <td>
                                            <button class="btn btn-xs btn-info"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10050</td>
                                        <td>CG 77</td>
                                        <td>Rommy Christensen</td>
                                        <td>Aktif</td>
                                        <td>Tanjung Duren</td>
                                        <td>087884914473</td>
                                        <td>
                                            <i class="fas fa-check"></i> CGT 1 <i class="fas fa-check"></i> MSJ 1 <br>
                                            <i class="fas fa-check"></i> CGT 2 <i class="fas fa-check"></i> MSJ 2 <br>
                                            <i class="fas fa-check"></i> CGT 3 <i class="fas fa-check"></i> MSJ 3 <br>
                                        </td>
                                        <td>
                                            <i class="fas fa-check"></i> CGT 1 <i class="fas fa-check"></i> MSJ 1 <br>
                                            <i class="fas fa-check"></i> CGT 2 <i class="fas fa-check"></i> MSJ 2 <br>
                                            <i class="fas fa-check"></i> CGT 3 <i class="fas fa-check"></i> MSJ 3 <br>
                                        </td>
                                        <td>Praise and Worship</td>
                                        <td>Anak ini agak bandel</td>
                                        <td>
                                            <button class="btn btn-xs btn-info"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10050</td>
                                        <td>CG 77</td>
                                        <td>Rommy Christensen</td>
                                        <td>Aktif</td>
                                        <td>Tanjung Duren</td>
                                        <td>087884914473</td>
                                        <td>
                                            <i class="fas fa-check"></i> CGT 1 <i class="fas fa-check"></i> MSJ 1 <br>
                                            <i class="fas fa-check"></i> CGT 2 <i class="fas fa-check"></i> MSJ 2 <br>
                                            <i class="fas fa-check"></i> CGT 3 <i class="fas fa-check"></i> MSJ 3 <br>
                                        </td>
                                        <td>
                                            <i class="fas fa-check"></i> CGT 1 <i class="fas fa-check"></i> MSJ 1 <br>
                                            <i class="fas fa-check"></i> CGT 2 <i class="fas fa-check"></i> MSJ 2 <br>
                                            <i class="fas fa-check"></i> CGT 3 <i class="fas fa-check"></i> MSJ 3 <br>
                                        </td>
                                        <td>Praise and Worship</td>
                                        <td>Anak ini agak bandel</td>
                                        <td>
                                            <button class="btn btn-xs btn-info"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NIJ</th>
                                        <th>Connect Group</th>
                                        <th>Full Name</th>
                                        <th>Status</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>CGT & MSJ</th>
                                        <th>5M</th>
                                        <th>Ministry</th>
                                        <th>Notes</th>
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
        $("#member-table").DataTable({
            // "responsive": true,
            // "lengthChange": true,
            // "autoWidth": true,
            "scrollX": true,
            "scrollY": 600,
            "buttons": ["copy", "colvis"]
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#member-table_wrapper .col-md-6:eq(0)');
        $('#member-table-2').DataTable({
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
