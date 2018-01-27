<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('assets/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/dist/css/AdminLTE.min.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="<?=base_url('assets/index2.html')?>"><b>Pusintek</b>GO</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?=(@$user_name) ? $user_name : 'Input Username'?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?=base_url('assets/dist/img/user1-128x128.jpg" alt="User Image')?>">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <?=form_open((@$user_name) ? 'auth/cek_pass' : 'auth', 'class="lockscreen-credentials"')?>
      <div class="input-group">
        <?php
if (@$user_name) {
	echo form_hidden('username', $user_name);
	$atr = array(
		'name' => 'password',
		'class' => 'form-control',
		'placeholder' => 'Password',
		'value' => set_value('Password'),
		'required' => TRUE,
	);
	echo form_password($atr);
	echo form_error('password', '<span class="help-block">', '</span>');
} else {
	$atr = array(
		'name' => 'username',
		'class' => 'form-control',
		'placeholder' => 'User Name',
		'value' => set_value('username'),
		'required' => TRUE,
	);
	echo form_input($atr);
	echo form_error('username', '<span class="help-block">', '</span>');
}
?>

        <div class="input-group-btn">
          <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    <?=form_close();?>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    <?=(@$user_name) ? 'Enter your password to retrieve your session' : 'Enter your username to retrieve your session'?>
  </div>
  <!-- <div class="text-center">
    <a href="login.html">Or sign in as a different user</a>
  </div> -->
  <div class="lockscreen-footer text-center">
    Copyright &copy; <?=date('Y')?> <b><a href="https://www.kemenkeu.go.id" class="text-black">PUSINTEK Kemenkeu</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="<?=base_url('assets/bower_components/jquery/dist/jquery.min.js"></scrip')?>t>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></scrip')?>t>
</body>
</html>