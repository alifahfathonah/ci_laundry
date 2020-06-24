<div id="wrapper">
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">
			<div class="container-fluid">
			<?= $this->session->flashdata('message'); ?>
				<!-- Page Heading -->
				<h1 class="h3 mb-2 text-gray-800">Lihat Transaksi</h1>
				<div class="card shadow mb-2">
					<div class="card-header py-3">
						<!-- <h6 class="m-0 font-weight-bold text-primary">Kategori</h6> -->
						<a class="btn btn-primary float-right" href="<?= base_url('laundry/tambahJenis') ?>">Tambah Paket Laundry</a>
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
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>
