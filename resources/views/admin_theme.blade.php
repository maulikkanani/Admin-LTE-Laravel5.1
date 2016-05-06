<!DOCTYPE html>
<?php 
    if(Auth::guest()){
            header("Location: adminlogin");
            die;
    }   
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  {!! HTML::style ('https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css') !!}
  {!! HTML::style ('admintheme/bootstrap/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!! HTML::style ('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  {!! HTML::style ('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') !!}
  <!-- Theme style -->
  {!! HTML::style ('admintheme/dist/css/AdminLTE.min.css') !!}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  {!! HTML::style ('admintheme/dist/css/skins/_all-skins.min.css') !!}
  <!-- iCheck -->
  {!! HTML::style ('admintheme/plugins/iCheck/flat/blue.css') !!}
  <!-- Morris chart -->
  {!! HTML::style ('admintheme/plugins/morris/morris.css') !!}
  <!-- jvectormap -->
  {!! HTML::style ('admintheme/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
  <!-- Date Picker -->
  {!! HTML::style ('admintheme/plugins/datepicker/datepicker3.css') !!}
  <!-- Daterange picker -->
  {!! HTML::style ('admintheme/plugins/daterangepicker/daterangepicker-bs3.css') !!}
  <!-- bootstrap wysihtml5 - text editor -->
  {!! HTML::style ('admintheme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
 @include('header')
  <!-- =============================================== -->
 @include('left')
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
   @yield('content')
  <!-- /.content-wrapper -->
   @include('footer')
   
</html>
