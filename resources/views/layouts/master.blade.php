
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AGROVET | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    @include('layouts.header.master')

    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar.master')

    <!-- Content Wrapper. Contains page content -->
    @include('layouts.content')
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Created with <i class="fa fa-heartbeat"></i> with AdminLTE and Laravel.
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">JuneX05 & Minchiey Codes</a>.</strong> All rights reserved.
    </footer>

    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/icheck.js') }}"></script>
@yield('scripts')
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            //increaseArea: '20%' /* optional */
        });
    });

</script>



</body>
</html>