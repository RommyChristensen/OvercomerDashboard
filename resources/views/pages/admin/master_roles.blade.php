@extends('components.admin.app')

@section('view_share')
    {{ View::share('nav_active', 'view-roles'); }}
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master Roles</li>
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
                    <form>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Role</h3>
                                <div class="card-tools">
                                    <!-- Collapse Button -->
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <input type="hidden" name="role_id" id="inputRoleId">
                                <div class="form-group">
                                    <label for="inputRoleName">Role Name</label>
                                    <input type="text" class="form-control" id="inputRoleName" name="role_name" placeholder="Enter Role Name">
                                </div>
                                {{-- <div class="form-group">
                                    <label>Privileges</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="callout callout-info">
                                            <h6 clas="mb-1"><b>Master Member</b></h6>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="checkBoxMM1">
                                                <label for="checkBoxMM1">
                                                    Add Member
                                                </label>
                                            </div>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="checkBoxMM2">
                                                <label for="checkBoxMM2">
                                                    Edit Member
                                                </label>
                                            </div>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="checkBoxMM3">
                                                <label for="checkBoxMM3">
                                                    Delete Member
                                                </label>
                                            </div>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="checkBoxMM4">
                                                <label for="checkBoxMM4">
                                                    View Member
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="callout callout-warning">
                                            <h6 clas="mb-1"><b>Master Connect Group</b></h6>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="checkBoxCG1">
                                                <label for="checkBoxCG1">
                                                    Add Connect Group
                                                </label>
                                            </div>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="checkBoxCG2">
                                                <label for="checkBoxCG2">
                                                    Edit Connect Group
                                                </label>
                                            </div>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="checkBoxCG3">
                                                <label for="checkBoxCG3">
                                                    Delete Connect Group
                                                </label>
                                            </div>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="checkBoxCG4">
                                                <label for="checkBoxCG4">
                                                    View Connect Group
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="callout callout-success">
                                            <h6 clas="mb-1"><b>Master Ministries</b></h6>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="checkBoxM1">
                                                <label for="checkBoxM1">
                                                    Add Ministry
                                                </label>
                                            </div>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="checkBoxM2">
                                                <label for="checkBoxM2">
                                                    Edit Ministry
                                                </label>
                                            </div>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="checkBoxM3">
                                                <label for="checkBoxM3">
                                                    Delete Ministry
                                                </label>
                                            </div>
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="checkBoxM4">
                                                <label for="checkBoxM4">
                                                    View Ministry
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
    
                                    </div>
                                </div> --}}
                                <button id="btnSave" type="submit" formaction="{{ route('master_role.add') }}" formmethod="POST" class="btn btn-success btn-sm">Save&nbsp;&nbsp;<i class="fas fa-save"></i></button>
                                <button id="btnEdit" type="submit" formaction="{{ route('master_role.udpate_by_id') }}" formmethod="POST" class="btn btn-success btn-sm">Save&nbsp;&nbsp;<i class="fas fa-save"></i></button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </form>
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
                                        <th>Role Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->role_name }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-success btn-add" href=""><i class="fas fa-eye"></i></a>
                                                <button class="btn btn-xs btn-info btn-edit" onclick="editClick({{$role->role_id}})"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-xs btn-danger btn-delete" onclick="deleteClick({{$role->role_id}})"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Role Name</th>
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
    let currentEditId = null;

    $(document).ready(function() {
        $("#btnEdit").hide();
    })

    const deleteClick = id => {
        showConfirmationDialog("Delete Data Role", "Are you sure to delete this data?", "warning",
        function() {
            $.ajax({
                method: 'POST',
                url: '{{ URL::URL_ROLE_DESTROY_BY_ID }}',
                data: {
                    role_id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: res => {
                    showLoading(false);
                    reloadPage();
                },
                err: err => {
                    showLoading(false);
                    reloadPage();
                }
            })
        },
        function() { });
    }

    const editClick = id => {
        showLoading(true);
        setTimeout(() => {
            $.ajax({
                method: 'GET',
                url: '{{ URL::URL_ROLE_GET_BY_ID }}',
                data: { role_id: id },
                success: res => {
                    editState = true;
                    currentEditId = id;
                    showLoading(false);
                    $("#btnEdit").show();
                    $("#btnSave").hide();
                    
                    console.log("roles: " + res)
                    populateUI({
                        inputRoleId: id,
                        inputRoleName: res.role_name
                    })
                },
                err: err => {
                    showLoading(false);
                }
            })
        }, parseInt(Math.floor(Math.random() * 3000)));
    }

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
