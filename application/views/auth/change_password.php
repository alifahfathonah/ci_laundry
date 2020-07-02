<?= $this->session->flashdata('message') ?>
<div class="container">

	<div class="row">
		<div class="card col-md-6 offset-md-3">
			<div class="card-header">
				<h2>Ubah Password</h2>
			</div>
			<div class="card-body">
				<form action="<?= base_url('auth/changePassword') ?>" method="POST">
					<div class="form-group">
						<label>Password Lama:</label>
						<input type="password" class="form-control form-control-user" name="current_password"
							placeholder="Password">
						<small class="text-danger"><?= form_error('current_password') ?> </small>
					</div>
					<div class="form-group">
						<label>Password Baru:</label>
						<input type="password" class="form-control form-control-user" name="password1"
							placeholder="Password">
						<small class="text-danger"><?= form_error('password1') ?> </small>
					</div>
					<div class="form-group">
						<label>Ulangi Password:</label>
						<input type="password" class="form-control form-control-user" name="password2"
							placeholder="Password">
						<small class="text-danger"><?= form_error('password2') ?> </small>
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
