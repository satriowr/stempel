<!DOCTYPE html>
<html>
<head>
  <title>Laporan Penjualan</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<body>
<center>
      <img src="../gambar/sistem/iconstempel.jpg" alt="" style="width: 10%; margin-top:70px;">
      <h2 style="margin-top:10px;">Laporan Penjualan Toko Stempel Kediri</h2>
</center>
  <style type="text/css">
    body{
      font-family: sans-serif;
    }

    .table{
      width: 100%;
    }

    th,td{
    }
    .table,
    .table th,
    .table td {
      padding: 5px;
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>



  <?php
  include '../koneksi.php';
  if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
    $tgl_dari = $_GET['tanggal_dari'];
    $tgl_sampai = $_GET['tanggal_sampai'];
    $customer = mysqli_query($koneksi,"SELECT SUM(invoice_total_bayar) AS totalpendapatan FROM invoice WHERE date(invoice_tanggal) >= '$tgl_dari' AND date(invoice_tanggal) <= '$tgl_sampai'");
    $jumlah = mysqli_fetch_array($customer);

    ?>
    <br/>
<div class="container">
    <table class="">
      <tr>
        <td width="20%">DARI TANGGAL</td>
        <td width="1%">:</td>
        <td><?php echo $tgl_dari; ?></td>
      </tr>
      <tr>
        <td>SAMPAI TANGGAL</td>
        <td>:</td>
        <td><?php echo $tgl_sampai; ?></td>
      </tr>
      <tr>
        <td>TOTAL PENDAPATAN</td>
        <td>:</td>
        <td><?php echo $jumlah['totalpendapatan']; ?></td>
      </tr>
    </table>
    </div>

    <br/>
<div class="container">
    <table class="table table-bordered table-striped" id="table-datatable">
      <thead>
        <tr>
          <th width="1%">NO</th>
          <th>INVOICE</th>
          <th>TANGGAL MASUK</th>
          <th>NAMA PELANGGAN</th>
          <th>JUMLAH</th>
          <th>STATUS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        $data = mysqli_query($koneksi,"SELECT * FROM invoice,customer WHERE invoice_customer=customer_id and date(invoice_tanggal) >= '$tgl_dari' AND date(invoice_tanggal) <= '$tgl_sampai'");
        while($i = mysqli_fetch_array($data)){
          ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
            <td><?php echo date('d-m-Y', strtotime($i['invoice_tanggal'])); ?></td>
            <td><?php echo $i['customer_nama'] ?></td>
            <td><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?></td>
            <td>
            <?php
                           if($i['invoice_status'] == 0){
                            echo "<span class='badge bg-warning'>Menunggu Pembayaran</span>";
                          }elseif($i['invoice_status'] == 1){
                            echo "<span class='badge bg-default'>Menunggu Konfirmasi</span>";
                          }elseif($i['invoice_status'] == 2){
                            echo "<span class='badge bg-primary'>Dikonfirmasi</span>";
                          }elseif($i['invoice_status'] == 3){
                            echo "<span class='badge bg-info'>Dikonfirmasi Dan Diproses</span>";
                          }elseif($i['invoice_status'] == 4){
                            echo "<span class='badge bg-primary'>Dikirim</span>";
                          }elseif($i['invoice_status'] == 5){
                            echo "<span class='badge bg-info'>SELESAI</span>";
                          }elseif($i['invoice_status'] == 6){
                            echo "<span class='badge bg-danger'>BATAL</span>";
                          }elseif($i['invoice_status'] == 7){
                            echo "<span class='badge bg-danger'>Dibatalkan</span>";
                          }
                          ?>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
    <div style="text-align: right; margin-top: 20px;"><?= date("d-m-Y") ?></div>
  <div style="text-align: right; margin-top: 70px;"><b>Admin</b></div>
    </div>

    <?php
  }else{
    ?>

    <div class="alert alert-info text-center">
      Silahkan Filter Laporan Terlebih Dulu.
    </div>

    <?php
  }
  ?>
</body>

<script>
  window.print();
</script>
</html>
