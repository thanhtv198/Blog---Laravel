<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AdminLTE 3 | Data Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('source/admin/plugins/datatables/dataTables.bootstrap4.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('source/admin/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('source/admin/dist/css/custom.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div id="app">
<div class="wrapper">
    <!-- Navbar -->
    @include('admin/layouts/header')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('admin/layouts/sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
       @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('admin/layouts/footer')
    <!-- Control Sidebar -->
    @include('admin/layouts/aside_right')
    <!-- /.control-sidebar -->
</div>
</div>
<!-- ./wrapper -->
<!-- jQuery -->

<script src="{{ asset('source/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('source/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('source/admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('source/admin/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('source/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('source/admin/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('source/admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('source/admin/dist/js/demo.js') }}"></script>

{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}

<script src="{{ asset('source/admin/dist/js/custom.js') }}"></script>


<!-- page script -->

<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

{{--<script src="{{ asset('js/app.js') }}"></script>--}}
</body>
</html>
