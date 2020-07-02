<div class="container">
	<div class="row">
		<div class="card col-md-6 offset-md-3">
			<div class="card-header">
				<h2>Tambah Karyawan</h2>
			</div>
			<div class="card-body">
				<form action="<?= base_url('home/tambahKaryawan') ?>" method="POST">
					<div class="form-group">
						<label>Nama:</label>
						<input type="text" class="form-control form-control-user" name="nama" placeholder="Nama">
						<small><?= form_error('nama') ?> </small>
					</div>
					<div class="form-group">
						<label>Username:</label>
						<input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username"
							placeholder="Username">
						<small><?= form_error('username') ?> </small>
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control form-control-user" name="password"
							placeholder="Password">
						<small><?= form_error('password') ?> </small>
					</div>
					<div class="form-group">
						<label>Alamat:</label>
						<input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat">
						<small><?= form_error('alamat') ?> </small>
					</div>
					<div class="form-group">
						<label>No Hp:</label>
						<input type="text" class="form-control form-control-user" name="nohp" placeholder="Nohp">
						<small><?= form_error('nohp') ?> </small>
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
