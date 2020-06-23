<div class="container">
	<div class="row">
		<div class="card col-md-6 offset-md-3">
			<div class="card-header">
				<h2>Tambah Jenis Paket</h2>
			</div>
			<div class="card-body">
				<form action="<?= base_url('laundry/tambahJenis') ?>" method="POST">
					<div class="form-group">
						<label >Nama:</label>
						<input type="text" class="form-control" id="uname" placeholder="Jenis Paket" name="jenis" required>
						<small><?= form_error('jenis') ?> </small>
					</div>
					<div class="form-group">
						<label >Harga:</label>
						<input type="number" class="form-control" placeholder="Harga" name="harga" required>
						<small><?= form_error('harga') ?> </small>
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
