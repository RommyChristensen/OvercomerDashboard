<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/overcomers.png') }}">
    <title>{{ config("app.name") }}</title>

    @section('view_share')

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <!-- Toastify -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar/main.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

    <style>
        #toast-container > .toast {
            background-image: none !important;
        }

        #toast-container > .toast:before {
            position: relative;
            font-size: 24px;
            line-height: 18px;
            float: left;
            margin-left: -1em;
            color: #FFF;
            padding-right: 0.5em;
            margin-right: 0.5em;

        }
        #toast-container .toast{
            background-color: #1b75bc !important;
        }
        #toast-container> .fa-check , .toast {
            background-color: #328b17 !important;
        }
        #toast-container> .fa-trash , .toast  {
            background-color: #590619 !important;
        }

        .toast-message{
            font-family: 'Calibri';
        }

        .loader {
            position: absolute;
            border: 4px solid #f3f3f3;
            border-radius: 50%;
            border-top: 4px solid #3498db;
            width: 40px;
            height: 40px;
            -webkit-animation: spin 1s linear infinite; /* Safari */
            animation: spin 1s linear infinite;
            z-index: 100;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        #loading {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            text-align: center;
            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
        }

        #loading-image {
            position: fixed;
            top: 50%;
            left: 50%;
            z-index: 100;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div id="loading">
        <img id="loading-image" src="{{ asset('assets/images/loading-2.gif') }}" alt="Loading..." />
    </div>
    
    <div class="wrapper">
        @include('components.admin.navbar')

        @include('components.admin.sidebar')

        @yield('content')

        @include('components.admin.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Toastify -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js') }}"></script>

    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/main.js') }}"></script>

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "30000",
            "hideDuration": "10000",
            "timeOut": "50000",
            "extendedTimeOut": "10000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            iconClasses: {
                error: 'fas fa-trash',
                info: 'fa fa-info',
                success: 'fas fa-check',
                warning: 'fas fa-heart',
            },
        }

        $(document).ready(function () {
            $("#love-click").click(() => {
                Toastify({
                    text: "Welcome Home!",
                    duration: 3000,
                    newWindow: true,
                    close: false,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        background: "linear-gradient(to right, #FDD36A, #DC8449)",
                    },
                    onClick: function(){}
                }).showToast();
            })
        });

        const successToast = function(message) {
            Toastify({
                text: message,
                duration: 3000,
                newWindow: true,
                close: false,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background: "#28a745",
                },
                onClick: function(){}
            }).showToast();
        }

        const showLoading = isShown => {
            isShown ? $("#loading").show() : $("#loading").hide();
        }

        const populateUI = object => {
            Object.entries(object).forEach(entry => {
                const [key, value] = entry;

                if($("#"+key)[0].nodeName == "INPUT"){
                    $("#"+key).val(value);
                }else if($("#"+key)[0].nodeName == "SELECT"){
                    $("#"+key).val(value).change();
                }
            });
        }

        const reloadPage = () => {
            window.location.reload();
        }

        const convertTimeFormat = time => {
            const [hours, minutes] = time.split(':').map(Number);
            const meridian = hours >= 12 ? 'PM' : 'AM';
            const twelveHourFormat = ((hours + 11) % 12) + 1;
            const paddedMinutes = minutes.toString().padStart(2, '0');
            const formattedTime = `${twelveHourFormat}:${paddedMinutes} ${meridian}`;
            return formattedTime;
        }

        const showConfirmationDialog = (title, message, icon, callbackSuccess, callbackCancel, confirmButtonText = "Yes", cancelButtonText = "No") => {
            Swal.fire({
                title: title,
                text: message,
                icon: icon,
                showCancelButton: true,
                confirmButtonText: confirmButtonText,
                cancelButtonText: cancelButtonText,
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    callbackSuccess();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    callbackCancel();
                }
            });
        }
    </script>

    @yield('add_on_scripts')
</body>

</html>
