<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">
	
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.png" />

	<base href="<?= base_url(); ?>">
    <title><?= $title; ?> - <?= $site_name; ?></title>
	<link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/mulish.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/bootstrap-icons.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/toast/jquery.toast.min.css">
	
</head>

<body>
	<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Propvenues</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap dropdown">
      <a class="nav-link px-3 dropdown-toggle" href="javacript:;" data-bs-toggle="dropdown">
		<img src="<?= base_url(); ?>assets/img/avatars/avatar.jpg" class="usrpic me-1" alt="Hemant" /> <span class="text-dark">Hemant</span>
	  </a>
	  <div class="dropdown-menu dropdown-menu-end">
               <a class="dropdown-item" href="javascript:;"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="<?= base_url('admin/logout');?>">Log out</a>
            </div>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">