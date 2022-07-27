<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Invoice Customer</li>
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

                <h4>INVOICE</h4>

                <div id="store">
                    <div class="row">

                        <?php 
						$id_invoice = $_GET['id'];
						$id = $_SESSION['customer_id'];
						$invoice = mysqli_query($koneksi,"SELECT * from invoice where invoice_id='$id_invoice' order by invoice_id desc");
           while($i = mysqli_fetch_array($invoice)){
							?>


                        <div class="col-lg-12">
                            <a href="customer_history.php" class="btn btn-primary btn-sm"><i
                                    class="fa fa-arrow-left"></i> KEMBALI</a>
                            <a href="customer_invoice_cetak.php?id=<?php echo $_GET['id'] ?>" target="_blank"
                                class="btn btn-default btn-sm"><i class="fa fa-print"></i> CETAK</a>

                            <br />
                            <br />

                            <h4>INVOICE-00<?php echo $i['invoice_id'] ?></h4>


                            <br />
                            <?php echo $i['invoice_nama']; ?><br />
                            <?php echo $i['invoice_alamat']; ?><br />
                            <?php echo $i['invoice_provinsi']; ?><br />
                            <?php echo $i['invoice_kabupaten']; ?><br />
                            Hp. <?php echo $i['invoice_hp']; ?><br />
                            <br />

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="1%">NO</th>
                                            <th>Produk</th>
                                            <th class="text-center">Catatan</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Jumlah</th>
                                            <th colspan="2" class="text-center">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                    $no = 1;
                    $total = 0;
                    $transaksi = mysqli_query($koneksi,"SELECT * from history,produk where history_produk=produk_id and history_invoice='$id_invoice' order by history_produk desc");
                    while($d=mysqli_fetch_array($transaksi)){
                      $total += $d['history_harga'];
                      ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <!--<td>
                          <center>
                            <?php if($d['produk_foto1'] == ""){ ?>
                              <img src="../gambar/sistem/produk.png" style="width: 50px;height: auto">
                            <?php }else{ ?>
                              <img src="../gambar/produk/<?php echo $d['produk_foto1'] ?>" style="width: 50px;height: auto">
                            <?php } ?>
                          </center>
                        </td> -->
                                            <td><?php echo $d['produk_nama']; ?></td>
                                            <td><?php echo $d['history_catatan']; ?></td>
                                            <td class="text-center">
                                                <?php echo "Rp. ".number_format($d['history_harga']).",-"; ?></td>
                                            <td class="text-center"><?php echo number_format($d['history_jumlah']); ?>
                                            </td>
                                            <td colspan="2" class="text-center">
                                                <?php echo "Rp. ".number_format($d['history_jumlah'] * $d['history_harga'])." ,-"; ?>
                                            </td>
                                        </tr>
                                        <?php 
                    }
                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" style="border: none"></td>
                                            <th>Berat</th>
                                            <td class="text-center"><?php echo number_format($i['invoice_berat']); ?>
                                                gram</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="border: none"></td>
                                            <th>Total Belanja</th>
                                            <td class="text-center"><?php echo "Rp. ".number_format($total)." ,-"; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="border: none"></td>
                                            <th>Ongkir (<?php echo $i['invoice_kurir'] ?>)</th>
                                            <td class="text-center">
                                                <?php echo "Rp. ".number_format($i['invoice_ongkir'])." ,-"; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="border: none"></td>
                                            <th>Total Bayar</th>
                                            <td class="text-center">
                                                <?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-"; ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>


                            <h5>STATUS :</h5>
                            <?php 
								if($i['invoice_status'] == 0){
                          echo "<span class='label label-warning'>Menunggu Pembayaran</span>";
                        }elseif($i['invoice_status'] == 1){
                          echo "<span class='label label-default'>Menunggu Konfirmasi</span>";
                        }elseif($i['invoice_status'] == 2){
                          echo "<span class='label label-primary'>Dikonfirmasi</span>";
                        }elseif($i['invoice_status'] == 3){
                          echo "<span class='label label-danger'>Ditolak</span>";
                        }elseif($i['invoice_status'] == 4){
                          echo "<span class='label label-primary'>Sedang Diproses</span>";
                        }elseif($i['invoice_status'] == 5){
                          echo "<span class='label label-primary'>Barang Diterima (Selesai)</span>";
                        }elseif($i['invoice_status'] == 6){
                          echo "<span class='label label-success'>Selesai</span>";
                        }elseif($i['invoice_status'] == 7){
                          echo "<span class='label label-danger'>Dibatalkan</span>";
                        }
								?>

                        </div>


                        <?php 
						}
						?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>