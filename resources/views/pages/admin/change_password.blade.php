@extends('components.admin.app')

@section('view_share')
    {{ View::share('nav_active', 'none'); }}
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Change Default Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Change Default Password</li>
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
                    <form action="{{ route('master_user.change_password') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <!-- Collapse Button -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputNewPassword">New Password</label>
                                <input type="password" name="password"
                                class="
                                    form-control
                                    @error('password')
                                        is-invalid
                                    @enderror
                                "
                                value="{{ old('password') }}"
                                id="inputNewPassword" placeholder="Enter New Password">
                                @error('password')
                                    <span id="input-new_password-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputNewPasswordConfirmation">Confirm New Password</label>
                                <input type="password" class="
                                    form-control
                                    @error('password_confirmation')
                                        is-invalid
                                    @enderror
                                "
                                value="{{ old('fullname') }}"
                                id="inputNewPasswordConfirmation" placeholder="Enter New Password Confirmation" name="password_confirmation">
                                @error('password_confirmation')
                                    <span id="input-new_password_confirmation-error" class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Submit&nbsp;&nbsp;<i class="fas fa-save"></i></button>
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
    });
</script>
@endsection
