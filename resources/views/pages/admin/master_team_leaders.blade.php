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
                            <h3 class="card-title">Add TL</h3>
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
                                    <input type="hidden" name="tl_id" id="inputTlId">
                                    <label for="inputTlName">Team Leader Name</label>
                                    <input type="text" name="tl_name" class="
                                    form-control
                                    @error('tl_name')
                                        is-invalid
                                    @enderror
                                    "
                                    id="inputTlName" placeholder="Enter Team Leader Name">
                                    @error('tl_name')
                                        <span id="input-tl_name-error" class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Team Leader</label>
                                    <select id="tl_leader" class="form-control select2" style="width: 100%;" name="member_id">
                                        @foreach ($members as $m)
                                            <option value="{{ $m->member_id }}">{{ $m->member_fullname }} - {{ $m->role->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Coaches</label>
                                    <select id="tl_coach" class="select2" name="coaches[]" multiple="multiple" data-placeholder="Select Coaches" style="width: 100%;">
                                        @foreach ($coaches as $c)
                                            <option value="{{ $c->coach_id }}">Coach {{ $c->coach_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button formmethod="post" formaction="{{ route('master_team_leaders.add') }}" type="submit" id="btn-submit" class="btn btn-success btn-sm">Add&nbsp;&nbsp;<i class="fas fa-plus"></i></button>
                                <button formmethod="post" formaction="{{ route('master_team_leaders.edit') }}" type="submit" id="btn-edit" class="btn btn-success btn-sm" style="display: none">Edit&nbsp;&nbsp;<i class="fas fa-edit"></i></button>
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
                            <h3 class="card-title">All Team Leaders</h3>
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
                                        <th>Team Leader</th>
                                        <th>Total Coach</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_tl as $tl)
                                        <tr>
                                            <td>{{ $tl->team_leader_name }}</td>
                                            <td>{{ $tl->member->member_fullname }}</td>
                                            <td>{{ count($tl->coaches) }}</td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-info" onclick="editClick({{$tl->tl_id}})"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-xs btn-primary"><i class="fas fa-eye"></i></button>
                                                <button type="button" class="btn btn-xs btn-danger" onclick="deleteClick({{$tl->tl_id}})"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Team Leader Name</th>
                                        <th>Team Leader</th>
                                        <th>Total Coach</th>
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
        $('#tl_coach').select2({})
        $('#tl_leader').select2({});
    });

    $('#tl_leader').on("select2:open", function(e) {
        // clear all selected
        $(".just-added").remove();
        $("#tl_coach option:selected").prop("selected", false);
        $("#btn-edit").hide();
        $("#btn-submit").show();
        $("#inputTlId").val('');
        $("#inputTlName").val('');
    });

    const editClick = id => {
        showLoading(true);
        setTimeout(() => {
            $.ajax({
                method: 'GET',
                url: '{{ URL::URL_TL_GET_BY_ID }}',
                data: { tl_id: id },
                success: res => {
                    showLoading(false);
                    console.log(res);

                    // clear all selected
                    $(".just-added").remove();
                    $("#tl_coach option:selected").prop("selected", false);

                    res[0].coaches.forEach(c => {
                        $("#tl_coach").append(`
                            <option value="${c.coach_id}" selected class="just-added">Coach ${c.coach_name}</option>
                        `);
                    });

                    $("#tl_leader").append(`
                        <option value="${res[0].member.member_id}" selected class="just-added">${res[0].member.member_fullname} - Coach</option>
                    `);

                    $("#inputTlName").val(res[0].team_leader_name);
                    $("#btn-submit").hide();
                    $("#btn-edit").show();
                    $("#inputTlId").val(id);
                },
                err: err => {
                    showLoading(false);
                }
            })
        }, parseInt(Math.floor(Math.random() * 1000)));
    }

    const deleteClick = id => {
        showConfirmationDialog("Delete Data TL", "Are you sure to delete this data?", "warning",
        function() {
            $.ajax({
                method: 'DELETE',
                url: '{{ URL::URL_TL_DESTROY_BY_ID }}',
                data: {
                    tl_id: id,
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
