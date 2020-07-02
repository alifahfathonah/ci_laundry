<div class="container">
	<div class="row">
		<div class="card col-md-6 offset-md-3">
			<div class="card-header">
				<h2>Edit Admin</h2>
			</div>
			<div class="card-body">
				<form action="<?= base_url('home/editKaryawan/'. $karyawan['id_user']) ?>" method="POST">
					<div class="form-group">
						<label>Nama:</label>
						<input type="text" class="form-control form-control-user" name="nama" placeholder="Nama" value="<?= $karyawan['nama'] ?>">
						<small><?= form_error('nama') ?> </small>
					</div>
					<div class="form-group">
						<label>Username:</label>
						<input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username"
							placeholder="Username" value="<?= $karyawan['username'] ?>">
						<small><?= form_error('username') ?> </small>
					</div>
					<div class="form-group">
						<label>Alamat:</label>
						<input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat" value="<?= $karyawan['alamat'] ?>">
						<small><?= form_error('alamat') ?> </small>
					</div>
					<div class="form-group">
						<label>No Hp:</label>
						<input type="text" class="form-control form-control-user" name="nohp" placeholder="Nohp" value="<?= $karyawan['notelp'] ?>">
						<small><?= form_error('nohp') ?> </small>
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
