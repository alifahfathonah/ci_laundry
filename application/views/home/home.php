<!-- Konten Home -->
<div class="container-fluid">

	<!-- Heading-->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h3 class="h3 mb-0 text-gray-800">Selamat Datang Di Web Laundry</h3>
	</div>

	<div class="row">

		<!-- Total Customer -->
		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Customer</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $customer; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Total Karyawan -->
		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Karyawan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $karyawan ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Order</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $order ?></div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>

	<!-- Content Row -->

	<div class="row">
	<div id="content">
			<div class="container-fluid">
			<?= $this->session->flashdata('message'); ?>
				<!-- Page Heading -->
				<h1 class="h3 mb-2 text-gray-800">List Transaksi</h1>
				<div class="card shadow mb-2">
					<div class="card-header py-3">
					</div>
					<div class="card-body">
						<div class="table-responsive table-bordered">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal Order</th>
										<th>Customer</th>
										<th>Pembayaran</th>
										<th>Paket</th>
										<th>Status Order</th>
										<th>Total</th>
										<th>Aksi</th>

									</tr>
								</thead>
								<?php $no = 0; ?>
								<tbody>
									<?php foreach ($transaksi as $item) { ?>
									<tr>
										<td><?= ++$no ?></td>
										<td><?= $item['tanggal_order']; ?> </td>
										<td><?= $item['nama']; ?> </td>
                                        <td><button class="btn btn-success"><?= $item['status_pembayaran']; ?> </button></td>
                                        <td><?= $item['jenis']; ?> </td>
                                        <td><button class="btn btn-info"><?= $item['status_order']; ?> </button></td>
                                        <td><?= "Rp. " . number_format($item['total'],0,',','.') ?> </td>
                                        <td><a href="<?= base_url('laundry/detail/'.$item['no_invoice']) ?>" class="btn btn-primary">Detail</a></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>
