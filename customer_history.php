<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active" style="color:#54b4c2;">Riwayat Pesanan Customer</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<div class="section">
	<div class="container">
		<div class="row">

			<!-- SIDEBAR -->
			<?php include 'customer_sidebar.php'; ?>


			<div id="main" class="col-md-9">

				<h4>HISTORY PESANAN</h4>

				<div id="store">
					<div class="row">

						<div class="col-lg-12">

							<?php
							if (isset($_GET['alert'])) {
								if ($_GET['alert'] == "gagal") {
									echo "<div class='alert alert-danger'>Gambar gagal diupload!</div>";
								} elseif ($_GET['alert'] == "sukses") {
									echo "<div class='alert alert-success'>Pesanan berhasil dibuat, silahkan melakukan pembayaran!</div>";
								} elseif ($_GET['alert'] == "upload") {
									echo "<div class='alert alert-success'>Konfirmasi pembayaran berhasil tersimpan, silahkan menunggu konfirmasi dari admin!</div>";
								} elseif ($_GET['alert'] == "hpesanan") {
									echo "<div class='alert alert-success'>Pesanan berhasil dibatalkan!</div>";
								} elseif ($_GET['alert'] == "gpesanan") {
									echo "<div class='alert alert-danger'>Pesanan gagal dibatalkan!</div>";
								}
							}
							?>

							<small class="text-muted">
								Semua data pesanan / invoice anda.
							</small>

							<br />
							<br />


							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>NO</th>
											<th>No.Invoice</th>
											<th>Tanggal</th>
											<th>Nama Penerima</th>
											<th>Total Bayar</th>
											<th class="text-center" colspan="2">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$id = $_SESSION['customer_id'];
										$invoice = mysqli_query($koneksi, "SELECT * from invoice,history where invoice_customer = '$id' and history_invoice=invoice_id GROUP BY invoice_id desc");
										while ($i = mysqli_fetch_array($invoice)) { ?>
											<tr>
												<td><?php echo $i['invoice_id'] ?></td>
												<td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
												<td><?php echo $i['invoice_tanggal'] ?></td>
												<td><?php echo $i['invoice_nama'] ?></td>
												<td><?php echo "Rp. " . number_format($i['invoice_total_bayar']) . " ,-" ?></td>
												<td class="text-center">
													<?php if ($i['invoice_status'] == 5) { ?>
														<span class='label label-warning'>Pesanan Sampai</span> <a href="?id=<?= $i['history_produk'] ?>#tab2" class="badge bg-success"><a class='btn btn-sm btn-success' href="customer_invoice.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-print"></i> Invoice</a></a href="?id=41">
													<?php } else { ?>
														<span class='label label-danger'>Pesanan Dibatalkan</span>
													<?php } ?>
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
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br><br>
		<br>
		<br><br>
		<hr>
	</div>
</div>

<?php include 'footer.php'; ?>