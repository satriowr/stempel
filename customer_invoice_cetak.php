<!DOCTYPE html>
<html>

<head>
    <title>Cetak Invoice</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="container-fluid">

        <?php
	session_start();
	include 'koneksi.php';
	?>

        <style>
        body {
            font-family: sans-serif;
        }

        .table {
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 5px 10px;
            border: 1px solid black;
        }
        </style>

        <div>

            <?php
		$id_invoice = $_GET['id'];
		$id = $_SESSION['customer_id'];
		$invoice = mysqli_query($koneksi,"select * from invoice where invoice_customer='$id' and invoice_id='$id_invoice' order by invoice_id desc");
		while($i = mysqli_fetch_array($invoice)){
			?>


            <div>

                <center>
                    <h3>Toko Stempel Kediri</h3>
                </center>

                <h4>INVOICE-00<?php echo $i['invoice_id'] ?></h4>


                <br />
                <?php echo $i['invoice_nama']; ?><br />
                <?php echo $i['invoice_alamat']; ?><br />
                <?php echo $i['invoice_provinsi']; ?><br />
                <?php echo $i['invoice_kabupaten']; ?><br />
                Hp. <?php echo $i['invoice_hp']; ?><br />
                <br />

                <table class="table">
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
                    $transaksi = mysqli_query($koneksi,"SELECT * from history,produk where history_produk=produk_id and history_invoice='$id_invoice' order by history_produk");
                    while($d=mysqli_fetch_array($transaksi)){
                      $total += $d['history_harga'];
                      ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <!-- <td>
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
                            <td class="text-center"><?php echo "Rp. ".number_format($d['history_harga']).",-"; ?></td>
                            <td class="text-center"><?php echo number_format($d['history_jumlah']); ?></td>
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
                            <td class="text-center"><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-"; ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
<div style="text-align: right; margin-top: 20px;"><?= date("d-m-Y") ?></div>
  <div style="text-align: right; margin-top: 70px;"><b><?= $i['invoice_nama'] ?></b></div>

                <h5>STATUS :</h5>
                <?php
				if($i['invoice_status'] == 0){
                          echo "<span class='badge bg-warning'>Menunggu Pembayaran</span>";
                        }elseif($i['invoice_status'] == 1){
                          echo "<span class='badge bg-default'>Menunggu Konfirmasi</span>";
                        }elseif($i['invoice_status'] == 2){
                          echo "<span class='badge bg-primary'>Dikonfirmasi</span>";
                        }elseif($i['invoice_status'] == 3){
                          echo "<span class='badge bg-danger'>Ditolak</span>";
                        }elseif($i['invoice_status'] == 4){
                          echo "<span class='badge bg-primary'>Sedang Diproses</span>";
                        }elseif($i['invoice_status'] == 5){
                          echo "<span class='badge bg-warning'>Selesai</span>";
                        }elseif($i['invoice_status'] == 6){
                          echo "<span class='badge bg-success'>Selesai</span>";
                        }elseif($i['invoice_status'] == 7){
                          echo "<span class='badge bg-danger'>Dibatalkan</span>";
                        }
				?>

            </div>


            <?php
		}
		?>
        </div>


        <script>
        window.print();
        </script>
    </div>
</body>

</html>
