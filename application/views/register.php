
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/AdminLTE.min.css" />
	<!-- iCheck -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/square-blue.css">

</head>
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<a href=""><b>ECSHAMCC</b> Biotech</a>
		</div>

		<div class="register-box-body">
			<p class="login-box-msg">Register a new membership</p>

			<?php 
			$fattr = array('class' => 'form-signin');
			echo form_open('/main/register', $fattr); ?>

			<div class="form-group has-feedback">
				<?php echo form_input(array('name'=>'firstname', 'id'=> 'firstname', 'placeholder'=>'First Name', 'class'=>'form-control', 'value' => set_value('firstname'))); ?>
				<?php echo form_error('firstname');?>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>

			<div class="form-group has-feedback">
				<?php echo form_input(array('name'=>'lastname', 'id'=> 'lastname', 'placeholder'=>'Last Name', 'class'=>'form-control', 'value'=> set_value('lastname'))); ?>
				<?php echo form_error('lastname');?>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>

			<div class="form-group has-feedback">
				<?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'Email', 'class'=>'form-control', 'value'=> set_value('email'))); ?>
				<?php echo form_error('email');?>     
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>

			<div class="form-group has-feedback">
				<?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Password', 'class'=>'form-control', 'value' => set_value('password'))); ?>
				<?php echo form_error('password') ?>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<div class="row">
				<div class="col-xs-4">
				</div><!-- /.col -->

				<div class="col-xs-4">

					<?php echo form_submit(array('value'=>'Sign up', 'class'=>'btn btn-primary btn-block btn-flat')); ?>
					<?php echo form_close(); ?>
				</div><!-- /.col -->

			</div>

		</div><!-- /.form-box -->
	</div><!-- /.register-box -->


	<script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.3.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
