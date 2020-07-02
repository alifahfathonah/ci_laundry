<div id="wrapper">
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">
			<div class="container-fluid">
			<?= $this->session->flashdata('message'); ?>
				<!-- Page Heading -->
				<h1 class="h3 mb-2 text-gray-800">Lihat Customer</h1>
				<div class="card shadow mb-2">
					<div class="card-header py-3">
						<a class="btn btn-primary float-right" href="<?= base_url('home/tambah_customer') ?>">Tambah Customer</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>Nomor Hp</th>
										<th>Opsi</th>

									</tr>
								</thead>
								<?php $no = 0; ?>
								<tbody>
									<?php foreach ($customer as $item) { ?>
									<tr>
										<td><?= ++$no ?></td>
										<td><?= $item['nama']; ?> </td>
										<td><?= $item['alamat']; ?> </td>
										<td><?= $item['no_hp']; ?> </td>
										<td><a href="<?= base_url('home/editCustomer/'.$item['id_customer']); ?>" class="btn btn-primary"><i class="fa fa-sm fa-edit"></i>Edit</a>
                                        <a href="<?= base_url('home/hapusCustomer/'.$item['id_customer']) ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?'); "><i class="fa fa-sm fa-trash"></i>Hapus</a>
                                        </td>
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
