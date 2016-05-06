<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  
  {!!  HTML::style ('admintheme/bootstrap/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!!  HTML::style ('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  {!!  HTML::style ('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') !!}
  <!-- Theme style -->
  {!!  HTML::style ('admintheme/dist/css/AdminLTE.min.css') !!}
  <!-- iCheck -->
  {!!  HTML::style ('admintheme/plugins/iCheck/square/blue.css') !!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h4 class="text-center">Register a new membership</h4	>

<!-- resources/views/auth/register.blade.php -->

<form method="POST" action="<?php echo url('register'); ?>">
    {!! csrf_field() !!}
	<div class="form-group has-feedback">
		@if (count($errors))
			
				@foreach($errors->all() as $error)
					<p style="color:red">{{ $error }}</p>
				@endforeach
			
		@endif
	</div>  
	
	<div class="form-group has-feedback">
        <input type="text" name="name"  class="form-control" placeholder="Name" value="{{ old('name') }}">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

	<div class="form-group has-feedback">
        <input type="email" name="email"  class="form-control" placeholder="Email" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    
	<div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	
	<div class="form-group has-feedback">
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder=" Confirm Password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
	<div class="row">
		<div class="col-xs-8 form-control-static">
			<a class="text-left" href="{{ url() }}/adminlogin">I already have a membership</a>
        </div>
		<!-- /.col -->
        <div class="col-xs-4">
			  <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
		</div>  
        <!-- /.col -->
    </div>
</form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
{!!  HTML::script ('admintheme/plugins/jQuery/jQuery-2.1.4.min.js') !!}
<!-- Bootstrap 3.3.5 -->
{!!  HTML::script ('admintheme/bootstrap/js/bootstrap.min.js') !!}
<!-- iCheck -->
{!!  HTML::script ('admintheme/plugins/iCheck/icheck.min.js') !!}
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>









