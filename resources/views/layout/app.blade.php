<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $title }} | SIMPEG UNINUS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="{{ url('/public/assets/img/cropped-web-copy-192x192.png') }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('/public/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/public/assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/public/assets/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('/public/assets/dist/css/skins/_all-skins.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ url('/public/assets/bower_components/morris.js/morris.css') }}">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ url('/public/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="{{ url('/public/assets/bower_components/jquery-ui.css') }}">
  @yield('css')
  <link rel="stylesheet" href="{{ url('/public/assets/bower_components/datatables/jquery.dataTables.min.css') }} ">
  <link rel="stylesheet" href="{{ url('/public/assets/bower_components/datatables/buttons.dataTables.min.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include ('layout.header')

  @include ('layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      @yield ('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> : 1.2
    </div>
    <strong>Copyright &copy; 2018.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ url('/public/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<!-- <script src="{{ url('/public/assets/bower_components/jquery-ui/jquery-ui.min.js') }}"></script> -->

  <!-- $.widget.bridge('uibutton', $.ui.button); -->
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('/public/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ url('/public/assets/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ url('/public/assets/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('/public/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ url('/public/assets/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>

<script src="{{ url('/public/assets/bower_components/moment/min/moment.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ url('/public/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('/public/assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
@yield('js')

<script type="text/javascript">
  
   $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                
            ]
        } );
    } );

   $(document).ready(function() {
        $('#example-2').DataTable( {
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                
            ]
        } );
    } );

</script>

<script type="text/javascript">

console.log('SIDE BAR');

</script>

<script src="{{ url('/public/assets/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('/public/assets/bower_components/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('/public/assets/bower_components/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ url('/public/assets/bower_components/datatables/jszip.min.js') }}"></script>
<script src="{{ url('/public/assets/bower_components/datatables/pdfmake.min.js') }}"></script>
<script src="{{ url('/public/assets/bower_components/datatables/vfs_fonts.js') }}"></script>
<script src="{{ url('/public/assets/bower_components/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ url('/public/assets/bower_components/datatables/buttons.print.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('/public/assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ url('/public/assets/dist/js/pages/dashboard.js') }}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/public/assets/dist/js/demo.js') }}"></script>
</body>
</html>
