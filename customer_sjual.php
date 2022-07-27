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
			
      <!-- SIDEBAR -->
<?php include 'customer_sidebar.php'; ?>


			<div id="main" class="col-md-9">
				
				<h4>Konfirmasi Pesanan</h4>

				<div id="store">
					<div class="row">

          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NO.INVOICE</th>
                    <th>TANGGAL</th>
                    <th>CUSTOMER</th>
                    <th>TOTAL BAYAR</th>
                    <th class="text-center">STATUS</th>
                    <th class="text-center">UPDATE STATUS</th>
                    <th class="text-center" width="25%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  $id= $_SESSION['customer_id'];
                  $invoice = mysqli_query($koneksi,"SELECT * from invoice,customer where '$id'=invoice_idpenjual and customer_nama=invoice_npenjual order by invoice_id desc");
                  while($i = mysqli_fetch_array($invoice)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
                      <td><?php echo date('d-m-Y', strtotime($i['invoice_tanggal'])); ?></td>
                      <td><?php echo $i['invoice_nama'] ?></td>
                      <td><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?></td>
                      <td class="text-center">
                  <?php 
                          if($i['invoice_status'] == 0){
                                        echo "<span class='label label-warning'>Menunggu Pembayaran</span>";
                                      }elseif($i['invoice_status'] == 1){
                                        echo "<span class='label label-default'>Menunggu Konfirmasi</span>";
                                      }elseif($i['invoice_status'] == 2){
                                        echo "<span class='label label-primary'>Pembayaran Masuk</span>";
                                      }elseif($i['invoice_status'] == 3){
                                        echo "<span class='label label-info'>Dikonfirmasi dan Diproses</span>";
                                      }elseif($i['invoice_status'] == 4){
                                        echo "<span class='label label-primary'>Dikirim</span>";
                                      }elseif($i['invoice_status'] == 5){
                                        echo "<span class='label label-warning'>Pesanan Sampai</span>";
                                      }elseif($i['invoice_status'] == 6){
                                        echo "<span class='label label-danger'>Dibatalkan</span>";
                                      }
                          ?>
                      </td>
                      <td class="text-center">
                        <form action="sjual_status.php" method="post">
                          <input type="hidden" value="<?php echo $i['invoice_id'] ?>" name="invoice">
                          <select name="status" id="" class="form-control" onchange="form.submit()">
                            <option <?php if($i['invoice_status'] == "1"){echo "selected='selected'";} ?> value="1">Menunggu Konfirmasi</option>
                            <option <?php if($i['invoice_status'] == "2"){echo "selected='selected'";} ?> value="2">Pembayaran Masuk</option>
                            <option <?php if($i['invoice_status'] == "3"){echo "selected='selected'";} ?> value="3">Dikonfirmasi Dan Diproses</option>
                            <option <?php if($i['invoice_status'] == "4"){echo "selected='selected'";} ?> value="4">Dikirim</option>
                            <option <?php if($i['invoice_status'] == "5"){echo "selected='selected'";} ?> value="5">Pesanan Sampai</option>
                            <option <?php if($i['invoice_status'] == "6"){echo "selected='selected'";} ?> value="6">Dibatalkan</option>
                          </select>
                        </form>
                      </td>
                      <td class="text-center">    

                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#buktiPembayaran_<?php echo $i['invoice_id']; ?>">
                          <i class="fa fa-search"></i> Bukti Pembayaran
                        </button>

                        <div class="modal fade" id="buktiPembayaran_<?php echo $i['invoice_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Bukti Pembayaran</h4>
                              </div>
                              <div class="modal-body">

                                <center>
                                  <?php 
                                  if($i['invoice_bukti'] == ""){
                                    echo "Bukti pembayaran belum diupload oleh pembeli/customer.";
                                  }else{
                                    ?>
                                    <img src="gambar/bukti_pembayaran/<?php echo $i['invoice_bukti']; ?>" alt="" style="width: 100%">
                                    <?php
                                  }
                                  ?>
                                </center>


                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>


                        <a class='btn btn-sm btn-success' href="sjual_invoice.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-print"></i> Invoice</a>
                        <a class='btn btn-sm btn-danger' href="sjual_hapus.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-trash"></i></a>
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
	</div>
</div>

<?php include 'footer.php'; ?>