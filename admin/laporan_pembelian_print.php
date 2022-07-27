<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penjualan</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

<body>

    <style type="text/css">
    body {
        font-family: sans-serif;
    }

    .table {
        width: 100%;
    }

    th,
    td {}

    .table,
    .table th,
    .table td {
        padding: 5px;
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>


    <center>
        <h2 style="margin-top:70px;">Laporan Pembelian Toko Stempel Kediri</h2>
    </center>

    <?php
    include '../koneksi.php';
    if (isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])) {
        $tgl_dari = $_GET['tanggal_dari'];
        $tgl_sampai = $_GET['tanggal_sampai'];
    ?>
    <br />
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
        </table>
    </div>

    <br />

    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="table-datatable">
            <thead>
                <tr>
                    <th width="1%">NO</th>
                    <th>NAMA SUPPLIER</th>
                    <th>TANGGAL MASUK</th>
                    <th>NAMA BARANG</th>
                    <th>HARGA</th>
                    <!-- <th>STATUS</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $qTotal = mysqli_query($koneksi, "SELECT SUM(produk_harga) as total_pembayaran FROM produk a JOIN supplier b WHERE a.id_supplier = b.id_supplier and date(a.tanggal) >= '$tgl_dari' AND date(a.tanggal) <= '$tgl_sampai'");
                    $total = mysqli_fetch_assoc($qTotal);

                    $data = mysqli_query($koneksi, "SELECT * FROM produk a JOIN supplier b WHERE a.id_supplier = b.id_supplier and date(a.tanggal) >= '$tgl_dari' AND date(a.tanggal) <= '$tgl_sampai'");
                    while ($i = mysqli_fetch_array($data)) {
                    ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $i['nama_supplier'] ?></td>
                    <td><?php echo date('d-m-Y', strtotime($i['tanggal'])); ?></td>
                    <td><?php echo $i['produk_nama'] ?></td>
                    <td><?php echo "Rp. " . number_format($i['produk_harga']) . " ,-" ?></td>
                    <!-- <td>
                                        <?php
                                        if ($i['invoice_status'] == 0) {
                                            echo "<span class='label label-warning'>Menunggu Pembayaran</span>";
                                        } elseif ($i['invoice_status'] == 1) {
                                            echo "<span class='label label-default'>Menunggu Konfirmasi</span>";
                                        } elseif ($i['invoice_status'] == 2) {
                                            echo "<span class='label label-primary'>Dikonfirmasi</span>";
                                        } elseif ($i['invoice_status'] == 3) {
                                            echo "<span class='label label-info'>Dikonfirmasi Dan Diproses</span>";
                                        } elseif ($i['invoice_status'] == 4) {
                                            echo "<span class='label label-primary'>Dikirim</span>";
                                        } elseif ($i['invoice_status'] == 5) {
                                            echo "<span class='label label-info'>SELESAI</span>";
                                        } elseif ($i['invoice_status'] == 6) {
                                            echo "<span class='label label-danger'>BATAL</span>";
                                        } elseif ($i['invoice_status'] == 7) {
                                            echo "<span class='label label-danger'>Dibatalkan</span>";
                                        }
                                        ?>
                                    </td> -->
                </tr>
                <?php
                    }
                    ?>
                <tr>
                    <td colspan="4" align="right">Total &nbsp;:</td>
                    <td>
                        <?php
                            echo "Rp. " . number_format($total['total_pembayaran']) . " ,-"
                            ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <div style="text-align: right; margin-top: 20px;"><?= date("d-m-Y") ?></div>
        <div style="text-align: right; margin-top: 70px;"><b>Admin</b></div>
    </div>

    <?php
    } else {
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
