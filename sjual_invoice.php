<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Pesanan Customer</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<div class="section">
	<div class="container">
		<div class="row">
			
<!-- ASIDE -->
<div id="aside" class="col-md-3">

  <div class="aside">
    <ul>
      <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer.php"> <i class="fa fa-home"></i> &nbsp; Dashboard</a></li>
      <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_jual.php"> <i class="fa fa-dollar"></i> &nbsp; jual Barang</a></li>
      <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_pesanan.php"> <i class="fa fa-list"></i> &nbsp; Pesanan Saya</a></li>
      <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_djual.php"> <i class="fa fa-list"></i> &nbsp; Barang Kamu</a></li>
      <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_sjual.php"> <i class="fa fa-info"></i> &nbsp; Konfirmasi Pesanan</a></li>
      <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_password.php"> <i class="fa fa-lock"></i> &nbsp; Ganti Password</a></li>
      <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_logout.php"> <i class="fa fa-sign-out"></i> &nbsp; Keluar</a></li>
    </ul>
  </div>
</div>
<!-- /ASIDE -->


			<div id="main" class="col-md-9">
				
				<h4>Data Barang</h4>

				<div id="store">
					<div class="row">

         <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Invoice Pesanan</h3>
          </div>
          <div class="box-body">

           <?php 
           // include '../skoneksi';
           $id_invoice = $_GET['id'];
           $invoice = mysqli_query($koneksi,"select * from invoice where invoice_id='$id_invoice' order by invoice_id desc");
           while($i = mysqli_fetch_array($invoice)){
            ?>


            <div class="col-lg-12">

              <a href="customer_sjual.php" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> KEMBALI</a>
              <a href="sjual_invoice_cetak.php?id=<?php echo $_GET['id'] ?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print"></i> CETAK</a>

              <br/>
              <br/>

              <h4>INVOICE-00<?php echo $i['invoice_id'] ?></h4>


              <br/>
              <?php echo $i['invoice_nama']; ?><br/>
              <?php echo $i['invoice_alamat']; ?><br/>
              <?php echo $i['invoice_provinsi']; ?><br/>
              <?php echo $i['invoice_kabupaten']; ?><br/>
              Hp. <?php echo $i['invoice_hp']; ?><br/>
              <br/>

              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center" width="1%">NO</th>
                      <th colspan="2">Produk</th>
                      <th class="text-center">Harga</th>
                      <th class="text-center">Jumlah</th>
                      <th class="text-center">Total Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    $total = 0;
                    $transaksi = mysqli_query($koneksi,"select * from transaksi,produk where transaksi_produk=produk_id and transaksi_invoice='$id_invoice'");
                    while($d=mysqli_fetch_array($transaksi)){
                      $total += $d['transaksi_harga'];
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td>
                          <center>
                            <?php if($d['produk_foto1'] == ""){ ?>
                              <img src="gambar/sistem/produk.png" style="width: 50px;height: auto">
                            <?php }else{ ?>
                              <img src="gambar/produk/<?php echo $d['produk_foto1'] ?>" style="width: 50px;height: auto">
                            <?php } ?>
                          </center>
                        </td>
                        <td><?php echo $d['produk_nama']; ?></td>
                        <td class="text-center"><?php echo "Rp. ".number_format($d['transaksi_harga']).",-"; ?></td>
                        <td class="text-center"><?php echo number_format($d['transaksi_jumlah']); ?></td>
                        <td class="text-center"><?php echo "Rp. ".number_format($d['transaksi_jumlah'] * $d['transaksi_harga'])." ,-"; ?></td>
                      </tr>
                      <?php 
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4" style="border: none"></td>
                      <th>Berat</th>
                      <td class="text-center"><?php echo number_format($i['invoice_berat']); ?> gram</td>
                    </tr>
                    <tr>
                      <td colspan="4" style="border: none"></td>
                      <th>Total Belanja</th>
                      <td class="text-center"><?php echo "Rp. ".number_format($total)." ,-"; ?></td>
                    </tr>
                    <tr>
                      <td colspan="4" style="border: none"></td>
                      <th>Ongkir (<?php echo $i['invoice_kurir'] ?>)</th>
                      <td class="text-center"><?php echo "Rp. ".number_format($i['invoice_ongkir'])." ,-"; ?></td>
                    </tr>
                    <tr>
                      <td colspan="4" style="border: none"></td>
                      <th>Total Bayar</th>
                      <td class="text-center"><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-"; ?></td>
                    </tr>
                  </tfoot>
                </table>
              </div>


              <h5>STATUS :</h5> 
              <?php 
             if($i['invoice_status'] == 0){
                echo "<span class='label label-default'>Menunggu Pembayaran</span>";
              }elseif($i['invoice_status'] == 1){
                echo "<span class='label label-danger'>Menunggu Konfirmasi Pembayaran</span>";
              }elseif($i['invoice_status'] == 2){
                echo "<span class='label label-primary'>Dikonfirmasi & Sedang Diproses</span>";
              }elseif($i['invoice_status'] == 3){
                echo "<span class='label label-warning'>Dikirim</span>";
              }elseif($i['invoice_status'] == 4){
                echo "<span class='label label-success'>Selesai</span>";
              }
              ?>

            </div>  


            <?php 
          }
          ?>

        </div>

      </div>
    </section>
  </div>
</section>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>