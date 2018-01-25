<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Muhammad Sholehuddin Al-Ayyubi">
    <meta name="description" content="Developed and Maintenance by Muhammad Sholehuddin Al-Ayyubi, S.Kom">
    <meta name="keyword" content="e-Performance, Bappenas">

    <title><?=strip_tags($title)?> | PusintekGO :: Kementerian Keuangan Republik Indonesia</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/bower_components/font-awesome/css/font-awesome.min.css')?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url('assets/bower_components/Ionicons/css/ionicons.min.css')?>">
    <!-- Pace style -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/pace/pace.min.css')?>">
    <!-- Google Font -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
    <link rel="shortcut icon" href="<?=base_url('favicon.ico')?>">
    <!-- CSS To Scroll Table when overflow -->
    <style type="text/css">
        .box-body { overflow-x: auto;}
    </style>
    <?php /*if ($tracking_code) foreach ($tracking_code as $code) {
        echo "<script>".$code['isi']."</script>";
    };*/ ?>