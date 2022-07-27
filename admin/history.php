<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      History
      <small>Data Transaksi / History</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">History / Pesanan</h3>
          </div>
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
                  $invoice = mysqli_query($koneksi,"SELECT * from invoice,customer,history where customer_id=invoice_customer AND invoice_id=history_invoice GROUP BY invoice_id desc");
                  while($i = mysqli_fetch_array($invoice)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
                      <td><?php echo date('d-m-Y', strtotime($i['invoice_tanggal'])); ?></td>
                      <td><?php echo $i['customer_nama'] ?></td>
                      <td><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?></td>
                      <td class="text-center">
                        <?php 
                        if($i['invoice_status'] == 0){
                          echo "<span class='label label-warning'>Menunggu Pembayaran</span>";
                        }elseif($i['invoice_status'] == 1){
                          echo "<span class='label label-default'>Menunggu Konfirmasi</span>";
                        }elseif($i['invoice_status'] == 2){
                          echo "<span class='label label-primary'>Dikonfirmasi</span>";
                        }elseif($i['invoice_status'] == 3){
                          echo "<span class='label label-info'>Dikonfirmasi Dan Diproses</span>";
                        }elseif($i['invoice_status'] == 4){
                          echo "<span class='label label-primary'>Dikirim</span>";
                        }elseif($i['invoice_status'] == 5){
                          echo "<span class='label label-info'>Pesanan Sampai</span>";
                        }elseif($i['invoice_status'] == 6){
                          echo "<span class='label label-danger'>Pesanan Dibatalkan</span>";
                        }elseif($i['invoice_status'] == 7){
                          echo "<span class='label label-danger'>Dibatalkan</span>";
                        }
                        ?>
                      </td>
                      <td class="text-center">
                    <?php if ($i['invoice_status'] == "5") { ?>
                      <span class="badge badge-success">Pesanan Sudah Selesai</span>
                    <?php } else { ?>
                      <span class="label label-danger">Pesanan Dibatalkan</span>
                    <?php } ?>

                      </td>
                      <td class="text-center">
                      <a class='btn btn-sm btn-success' href="transaksi_invoice.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-print"></i> Lihat Data</a>
                      <a class='btn btn-sm btn-danger' href="history_hapus.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-trash"></i></a>
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
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>