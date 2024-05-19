@extends('components.admin.app')

@section('view_share')
    {{ View::share('nav_active', 'view-menus'); }}
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Privileges</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master Privileges</li>
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
                                <h3 class="card-title">Add Privilege</h3>
                                <div class="card-tools">
                                    <!-- Collapse Button -->
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Choose Role</label>
                                    <select class="form-control select2" style="width: 100%;" id="chooseRole" name="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->role_id }}"
                                                    @if($role->role_id == 1) selected @endif
                                                >{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <table id="role-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Menu Id</th>
                                            <th>Menu Display Name</th>
                                            <th>Menu Link</th>
                                        </tr>
                                    </thead>
                                    <tbody id="menu-role-body">
                                        @foreach ($privileges as $privilege)
                                            <tr>
                                                <td>{{ $privilege->menu_id }}</td>
                                                <td>{{ $privilege->menu_display_name }}</td>
                                                <td>{{ $privilege->menu_link }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Menu Id</th>
                                            <th>Menu Display Name</th>
                                            <th>Menu Link</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <hr>
                                <div class="form-group">
                                    <label for="inputPrivilegeName">Privilege Name</label>
                                    <input type="text" class="form-control" id="inputPrivilegeName" name="privilege_name" placeholder="Enter Privilege Name">
                                </div>
                                <div class="form-group">
                                    <label>List Menu</label>
                                    <select class="form-control select2" style="width: 100%;" name="menu_id" id="list-menu">
                                        @foreach ($menu_available as $menu)
                                            <option value="{{ $menu->menu_id }}">{{ $menu->menu_display_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button id="btnSave" type="submit" formaction="{{ route('master_menu.add') }}" formmethod="POST" class="btn btn-success btn-sm">Save&nbsp;&nbsp;<i class="fas fa-save"></i></button>
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
                            <h3 class="card-title">All Menus</h3>
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
                                        <th>Menu Id</th>
                                        <th>Menu Display Name</th>
                                        <th>Menu Parent Id</th>
                                        <th>Menu Level</th>
                                        <th>Menu Link</th>
                                        <th>Menu is Sidebar</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td>{{ $menu->menu_id }}</td>
                                            <td>{{ $menu->menu_display_name }}</td>
                                            <td>{{ $menu->menu_parent_id }}</td>
                                            <td>{{ $menu->menu_level }}</td>
                                            <td>{{ $menu->menu_link }}</td>
                                            <td>{{ $menu->menu_is_sidebar }}</td>
                                            {{-- <td>
                                                <button class="btn btn-xs btn-info btn-edit" onclick="editClick({{$menu->menu_id}})"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-xs btn-danger btn-delete" onclick="deleteClick({{$menu->menu_id}})"><i class="fas fa-trash"></i></button>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Menu Id</th>
                                        <th>Menu Display Name</th>
                                        <th>Menu Parent Id</th>
                                        <th>Menu Level</th>
                                        <th>Menu Link</th>
                                        <th>Menu is Sidebar</th>
                                        {{-- <th>Action</th> --}}
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
        $("#chooseRole").change(function() {
            let roleId = $(this).val();
            $("#role-table").DataTable();
            $.ajax({
                method: 'GET',
                url: '{{ URL::URL_GET_PRIVILEGE_BY_ROLE_ID }}',
                data: {
                    role_id: roleId
                },
                success: res => {
                    showLoading(false);
                    $(`#menu-role-body`).html('');
                    $(`#list-menu`).html('');
                
                    res.privileges.forEach(menu => {
                        $(`#menu-role-body`).append(`
                            <tr>
                                <td>${menu.menu_id}</td>
                                <td>${menu.menu_display_name}</td>
                                <td>${menu.menu_link}</td>
                            </tr>
                        `);
                    });

                    res.list_menu.forEach(m => {
                        $('#list-menu').append(`
                            <option value="${m.menu_id}">${m.menu_display_name}</option>
                        `);
                    });

                    $("#role-table").DataTable();

                },
                err: err => {
                    showLoading(false);
                    reloadPage();
                }
            })
        })
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
