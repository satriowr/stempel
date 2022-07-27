<?php include 'header.php';?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active" style="color:#54b4c2;">Pesanan Customer</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<div class="section">
	<div class="container">
		<div class="row">

			<!-- SIDEBAR -->
<?php include 'customer_sidebar.php';?>


			<div id="main" class="col-md-9">

				<h4>PESANAN SAYA</h4>

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

	

							<div class="table-responsive">
								<table class="table table-bordered" id="table-datatable">
									<thead>
										<tr>
											<th class="text-center">NO</th>
											<th class="text-center">No.Invoice</th>
											<th class="text-center">Tanggal</th>
											<th class="text-center">Nama Pembeli</th>
											<th class="text-center">Total Bayar</th>
											<th class="text-center">Status</th>
										
											<?php
$id = $_SESSION['customer_id'];
$invoice = mysqli_query($koneksi, "SELECT * from invoice,transaksi where invoice_customer = '$id' and transaksi_invoice=invoice_id GROUP BY invoice_id desc");
while ($i = mysqli_fetch_array($invoice)) {
    if ($i['invoice_resi'] !== '') {?>

											<th class="text-center">No Resi</th>

	<?php }}?>
											<th class="text-center">Pilihan</th>
										</tr>
									</thead>
									<tbody>
										<?php
$id = $_SESSION['customer_id'];
$invoice = mysqli_query($koneksi, "SELECT * from invoice,transaksi where invoice_customer = '$id' and transaksi_invoice=invoice_id GROUP BY invoice_id desc");
while ($i = mysqli_fetch_array($invoice)) {
    ?>
											<tr>
												<td><?php echo $i['invoice_id'] ?></td>
												<td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
												<td><?php echo $i['invoice_tanggal'] ?></td>
												<td><?php echo $i['invoice_nama'] ?></td>
												<td><?php echo "Rp. " . number_format($i['invoice_total_bayar']) . " ,-" ?></td>
												<td class="text-center">
												<?php
if ($i['invoice_status'] == 0) {
        echo "<span class='label label-warning'>Menunggu Pembayaran</span>";
    } elseif ($i['invoice_status'] == 1) {
        echo "<span class='label label-default'>Menunggu Konfirmasi</span>";
    } elseif ($i['invoice_status'] == 2) {
        echo "<span class='label label-primary'>Pembayaran Masuk</span>";
    } elseif ($i['invoice_status'] == 3) {
        echo "<span class='label label-info'>Dikonfirmasi dan Diproses</span>";
    } elseif ($i['invoice_status'] == 4) {
        echo "<span class='label label-primary'>Dikirim</span>";
    } elseif ($i['invoice_status'] == 5) {
        echo "<span class='label label-warning'>Pesanan Sampai</span>";
    } elseif ($i['invoice_status'] == 6) {
        echo "<span class='label label-danger'>Dibatalkan</span>";
    }?>
												</td>
												<?php if ($i['invoice_resi'] !== '') {?>
												<td><span class='label label-info'><?=$i['invoice_resi']?></span></td>
   												<?php }?>
												<td class="text-center">
												<?php if ($i['invoice_status'] == 0) {?>
												<a class='btn btn-sm btn-primary' href="customer_pembayaran.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-money"></i> Konfirmasi Pembayaran</a>
												<br>
												<br>

												<a class='btn btn-sm btn-danger' href="customer_hpesanan_konfir.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-warning"></i> Batalkan Pemesanan</a>
												<?php } elseif ($i['invoice_status'] == 1) {?>
													<span class='label label-default label-primary'>Menunggu Konfirmasi</span>
												<!--<a class='btn btn-sm btn-danger' href="customer_hpesanan_konfir.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-warning"></i> Batalkan Pemesanan</a>-->
												<?php } elseif ($i['invoice_status'] == 2) {?>
													<span class='label label-info'>Pesanan Sedang Diproses</span>
												<!--<a class='btn btn-sm btn-danger' href="customer_hpesanan_konfir.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-warning"></i> Batalkan Pemesanan</a> -->
												<?php } elseif ($i['invoice_status'] == 3) {?>
												<span class="label label-info">Pesanan Sedang Diproses</span>
												<?php } elseif ($i['invoice_status'] == 4) {?>
												<form action="customer_deliv.php" method="POST">
													<input type="hidden" name="id_transaksi" value="<?=$i['invoice_id']?>">
													<button class='btn btn-sm btn-success' type="submit"><i class="fa fa-paper-plane"></i> Konfirmasi Pesanan Telah Sampai</button>
												</form>
												<?php } elseif ($i['invoice_status'] == 5) {?>

												<?php } else {?>

												<?php }?>
												</td>
											</tr>
											<?php
}
?>
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
			<br>
			<br><br>
			<hr>
	</div>
</div>

<?php include 'footer.php';?>