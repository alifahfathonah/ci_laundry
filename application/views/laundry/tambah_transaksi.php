<div class="container text-dark">
	<div class="row">
		<div class="card col-md-10 offset-md-1">
			<div class="card-header">
				<h2>Tambah Transaksi</h2>
			</div>
			<div class="card-body">
				<form method="POST" action="<?= base_url('laundry/tambahTransaksi'); ?>">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Kode Invoice</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="invoice" value="<?= $invoice ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Customer</label>
						<div class="col-sm-10">
							<select name="customer"  class="customer form-control">
							<?php foreach ($customer as $item): ?>
							<option value="<?= $item['id_customer'] ?>"><?= $item['nama'] ?></option>
							<?php endforeach; ?>
							</select>
						</div>
					</div>
					<fieldset class="form-group">
						<div class="row">
							<legend class="col-form-label col-sm-2 pt-0">Paket Laundry</legend>
							<div class="col-sm-10">
							<select name="jenis"  class="customer form-control">
							<?php foreach ($paket as $item): ?>
							<option value="<?= $item['id_paket'] ?>"><?= $item['jenis'] ?></option>
							<?php endforeach; ?>
							</select>
							</div>
						</div>
					</fieldset>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Berat (kg)</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="berat">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Tanggal Ambil</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" name="tanggalAmbil">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Status Pembayaran</label>
						<div class="col-sm-10">
							<select name="statusBayar" class="form-control">
								<option value="Belum">Belum</option>
								<option value="Sudah">Sudah</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$(".customer").select2();
	});

</script>
