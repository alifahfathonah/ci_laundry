<div class="container">
	<div class="row">
		<div class="card col-md-6 offset-md-3">
			<div class="card-header">
				<h2>Tambah Customer</h2>
			</div>
			<div class="card-body">
				<form action="<?= base_url('home/editCustomer/'. $customer['id_customer']) ?>" method="POST">
					<div class="form-group">
						<label >Nama:</label>
						<input type="text" class="form-control" id="uname" placeholder="Nama Customer" name="nama" required value="<?= $customer['nama']; ?>">
						<small><?= form_error('nama') ?> </small>
					</div>
					<div class="form-group">
						<label >Alamat Lengkap:</label>
						<input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" required value="<?= $customer['alamat'] ?>">
						<small><?= form_error('alamat') ?> </small>
					</div>
					<div class="form-group">
						<label >No Hp:</label>
						<input type="text" class="form-control" id="uname" placeholder="No Hp" name="nohp" required value="<?= $customer['no_hp'] ?>">
						<small><?= form_error('nohp') ?> </small>
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
