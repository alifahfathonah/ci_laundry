<?php
	if(!$this->session->has_userdata('username')){
		redirect('login');
	}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Css -->
	<link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">
	<link href="<?= base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('assets/css/select2.min.css') ?>">
	<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/select2.min.js"></script>
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Mulai Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<!-- <div class="sidebar-brand-icon rotate-n-15">
				</div> -->
				<!-- Nama Web nya -->
				<div class="sidebar-brand-text mx-3">Web Laundry </div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="<?= base_url('home') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Menu
			</div>

			<!-- Navigation User -->
			<?php
			if ($this->session->userdata('role') == 'admin') { ?>
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
					aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-fw fa-folder"></i>
					<span>Manajemen User</span>
				</a>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?= base_url('home/lihatAdmin'); ?>">Admin</a>
						<a class="collapse-item" href="<?= base_url('home/lihatKaryawan') ?>">Karyawan</a>
					</div>
				</div>
			</li>
			<?php } ?>

			<!-- Navigasi Menu Customer -->
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('home/customer') ?>">
					<i class="fa fa-user"></i>
					<span>Customer</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('laundry/lihatTransaksi') ?>">
					<i class="fa fa-shopping-cart"></i>
					<span>Transaksi</span></a>
			</li>

			<!-- Navigasi - Paket Laundry -->
			<?php
			if ($this->session->userdata('role') == 'admin') { ?>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('laundry/jenis_laundry') ?>">
					<i class="fas fa-fw fa-inbox"></i>
					<span>Paket Laundry</span></a>
			</li>
			<?php } ?>
			<!-- Navigasi Ubah Password -->
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('auth/changePassword') ?>">
					<i class="fa fa-lock"></i>
					<span>Change Password</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>

						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Navigasi - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span
									class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username'); ?></span>
								<img class="img-profile rounded-circle" src="<?= base_url('assets/img/user.png') ?>">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="userDropdown">
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->
