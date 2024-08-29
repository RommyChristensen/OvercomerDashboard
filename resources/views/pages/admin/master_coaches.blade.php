@extends('components.admin.app')

@section('view_share')
    {{ View::share('nav_active', 'view-coaches'); }}
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Coaches</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master Coaches</li>
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
                            <h3 class="card-title">Add Coach</h3>
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="coach_id" id="inputCoachId">
                                    <label for="inputCoachName">Coach Name</label>
                                    <input type="text" name="coach_name" class="
                                    form-control
                                    @error('coach_name')
                                        is-invalid
                                    @enderror
                                    "
                                    id="inputCoachName" placeholder="Enter Coach Name">
                                    @error('coach_name')
                                        <span id="input-coach_name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Coach</label>
                                    <select id="coach_leader" class="form-control select2" style="width: 100%;" name="member_id">
                                        @foreach ($members as $m)
                                            <option value="{{ $m->member_id }}">{{ $m->member_fullname }} - {{ $m->role->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Connect Groups</label>
                                    <select id="coach_cg" class="select2" name="connect_groups[]" multiple="multiple" data-placeholder="Select Connect Groups" style="width: 100%;">
                                        @foreach ($connect_groups as $cg)
                                            <option value="{{ $cg->connect_group_id }}">CG {{ $cg->connect_group_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button formmethod="post" formaction="{{ route('master_coaches.add') }}" type="submit" id="btn-submit" class="btn btn-success btn-sm">Add&nbsp;&nbsp;<i class="fas fa-plus"></i></button>
                                <button formmethod="post" formaction="{{ route('master_coaches.edit') }}" type="submit" id="btn-edit" class="btn btn-success btn-sm" style="display: none">Edit&nbsp;&nbsp;<i class="fas fa-edit"></i></button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Coaches</h3>
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
                                        <th>Coach Name</th>
                                        <th>Coach</th>
                                        <th>Total CG</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coaches as $coach)
                                        <tr>
                                            <td>{{ $coach->coach_name }}</td>
                                            <td>{{ $coach->member->member_fullname }}</td>
                                            <td>{{ count($coach->connect_groups) }}</td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-info" onclick="editClick({{$coach->coach_id}})"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></button>
                                                <button type="button" class="btn btn-xs btn-danger" onclick="deleteClick({{$coach->coach_id}})"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Coach Name</th>
                                        <th>Coach</th>
                                        <th>Total CG</th>
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
        $('#coach_cg').select2({})
        $('#coach_leader').select2({});
    });

    $('#coach_leader').on("select2:open", function(e) {
        // clear all selected
        $(".just-added").remove();
        $("#coach_cg option:selected").prop("selected", false);
        $("#btn-edit").hide();
        $("#btn-submit").show();
        $("#inputCoachId").val('');
        $("#inputCoachName").val('');
    });

    const editClick = id => {
        showLoading(true);
        setTimeout(() => {
            $.ajax({
                method: 'GET',
                url: '{{ URL::URL_COACH_GET_BY_ID }}',
                data: { coach_id: id },
                success: res => {
                    showLoading(false);
                    console.log(res);

                    // clear all selected
                    $(".just-added").remove();
                    $("#coach_cg option:selected").prop("selected", false);

                    res[0].connect_groups.forEach(cg => {
                        $("#coach_cg").append(`
                            <option value="${cg.connect_group_id}" selected class="just-added">CG ${cg.connect_group_number}</option>
                        `);
                    });

                    $("#coach_leader").append(`
                        <option value="${res[0].member.member_id}" selected class="just-added">${res[0].member.member_fullname} - Coach</option>
                    `);

                    $("#inputCoachName").val(res[0].coach_name);
                    $("#btn-submit").hide();
                    $("#btn-edit").show();
                    $("#inputCoachId").val(id);
                },
                err: err => {
                    showLoading(false);
                }
            })
        }, parseInt(Math.floor(Math.random() * 1000)));
    }

    const deleteClick = id => {
        showConfirmationDialog("Delete Data Coach", "Are you sure to delete this data?", "warning",
        function() {
            $.ajax({
                method: 'DELETE',
                url: '{{ URL::URL_COACH_DESTROY_BY_ID }}',
                data: {
                    coach_id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: res => {
                    showLoading(false);
                    successToast(res);
                    setTimeout(() => {
                        reloadPage();
                    }, Math.floor(Math.random() * 1000));
                },
                err: err => {
                    showLoading(false);
                    reloadPage();
                }
            })
        },
        function() { });
    }
</script>
@endsection
