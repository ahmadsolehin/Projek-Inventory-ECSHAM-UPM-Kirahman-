<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/AdminLTE.min.css" />

</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href=""><b>ECSHAMCC</b>Biotech</a>
		</div><!-- /.login-logo -->
		<div class="login-box-body">

			<p class="login-box-msg">Almost There!</p>

			<h5>Hello <span><?php echo $firstName; ?></span>. Your username is <span><?php echo $email;?></span></h5>
			<small>Please enter a password to begin using the site.</small>

			<?php 
			$fattr = array('class' => 'form-signin');
			echo form_open('/main/complete2/token/'.$token,  $fattr); ?>

			<div class="form-group has-feedback">
				<?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Password', 'class'=>'form-control', 'value' => set_value('password'))); ?>
				<?php echo form_error('password') ?>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>

			<div class="form-group has-feedback">
				<?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'Confirm Password', 'class'=>'form-control', 'value'=> set_value('passconf'))); ?>
				<?php echo form_error('passconf') ?>        
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<div class="row">
				<div class="col-xs-4">
				</div><!-- /.col -->
				<div class="col-xs-4">
					<?php echo form_hidden('user_id', $user_id);?>
					<?php echo form_submit(array('value'=>'Complete', 'class'=>'btn btn-primary btn-block btn-flat')); ?>
					<?php echo form_close(); ?>
				</div><!-- /.col -->
			</div>


		</div><!-- /.login-box-body -->
	</div><!-- /.login-box -->
	<!-- jQuery 2.1.4 -->
	<script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.3.min.js"></script>
	<!-- Bootstrap 3.3.5 -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- iCheck -->


</body>
</html>


