<div class="container text-dark">
	<div class="row">
		<div class="card col-md-10 offset-md-1">
			<div class="card-header">
				<h2>Tambah Jenis Paket</h2>
			</div>
			<div class="card-body">
				<form method="POST" action="<?= base_url('laundry/tambahTransaksi'); ?>">
					<div class="form-group row">
						<table class="table table-striped">
							<tr>
								<td width="20%" style="background-color: #4e73df; color:white">No Invoice</td>
								<td style="color: #797979"><?= $transaksi['no_invoice'] ?></td>
							</tr>
							<tr>
								<td class="label">Nama Lengkap</td>
								<td class="data"><?= $transaksi['nama'] ?></td>
							</tr>
							<tr>
								<td class="label">Alamat Lengkap</td>
								<td class="data"><?= $transaksi['alamat'] ?></td>
							</tr>
							<tr>
								<td class="label">Alamat Lengkap</td>
								<td class="data"><?= $transaksi['no_hp'] ?></td>
							</tr>
							<tr>
								<td class="label">Status Pembayaran</td>
								<td class="data">
                                <select name="statusBayar" class="form-control">
                                    <option value="<?= $transaksi['status_pembayaran'] ?>" selected><?= $transaksi['status_pembayaran'] ?></option>
                                    <?php if ( $transaksi['status_pembayaran'] == 'Belum') { ?>
                                    <option value="Sudah">Sudah</option>
                                    <?php } ?>
                                </select>
                                </td>
							</tr>
							<tr>
								<td class="label">Status Order</td>
								<td class="data">
                                <select name="statusBayar" class="form-control">
                                    <option value="<?= $transaksi['status_order'] ?>" selected><?= $transaksi['status_order'] ?></option>
                                    <?php if ( $transaksi['status_order'] == 'Baru') { ?>
                                    <option value="Diproses">Diproses</option>
                                    <option value="Diambil">Diambil</option>
                                    <?php } else{ ?>
                                        <option value="Diambil">Diambil</option>
                                    <?php } ?>
                                </select>
                                </td>
							</tr>
						</table>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Sign in</button>
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
