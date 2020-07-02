<div id="wrapper">
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">
			<div class="container-fluid">
			<?= $this->session->flashdata('message'); ?>
				<!-- Page Heading -->
				<h1 class="h3 mb-2 text-gray-800">Lihat Admin</h1>
				<div class="card shadow mb-2">
					<div class="card-header py-3">
					</div>
					<div class="card-body">
						<div class="table-responsive table-bordered">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>Nomor Telepon</th>
									</tr>
								</thead>
								<?php $no = 0; ?>
								<tbody>
									<?php foreach ($karyawan as $item) { ?>
									<tr>
										<td><?= ++$no ?></td>
										<td><?= $item['nama']; ?> </td>
										<td><?= $item['alamat']; ?> </td>
										<td><?= $item['notelp']; ?> </td>
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
