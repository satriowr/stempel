<?php include 'header.php'; ?>



<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Check Out</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="order-summary clearfix">
                    <div class="section-title">
                        <h3 class="title">Buat Pesanan</h3>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-sm btn-primary" style="background: #54b4c2;" data-toggle="modal" data-target="#pilihALamat">Pilih Alamat Pengiriman</a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="pilihALamat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Pilih ALamat Pengiriman</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="pilih_alamat_checkout.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $_SESSION['customer_id']; ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php
                                                $no = 1;
                                                $id = $_SESSION['customer_id'];
                                                $customer = mysqli_query($koneksi, "select * from customer where customer_id='$id'");
                                                while ($ix = mysqli_fetch_array($customer)) {
                                                ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="default" id="<?= $ix['customer_alamat'] ?>" value="option1" checked>
                                                        <label class="form-check-label" for="<?= $ix['customer_alamat'] ?>">
                                                            (Alamat 1) - <?= $ix['customer_alamat'] ?>
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="default" id="<?= $ix['customer_alamat2'] ?>" value="option2">
                                                        <label class="form-check-label" for="<?= $ix['customer_alamat2'] ?>">
                                                            (Alamat 2) - <?= $ix['customer_alamat2'] ?>
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="default" id="<?= $ix['customer_alamat3'] ?>" value="option3">
                                                        <label class="form-check-label" for="<?= $ix['customer_alamat3'] ?>">
                                                            (Alamat 3) - <?= $ix['customer_alamat3'] ?>
                                                        </label>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-primary btn-sm" type="submit">Pilih Sebagai
                                                    Alamat
                                                    Pengiriman</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form method="post" action="checkout_act.php">
                            <div class="col-lg-6">

                                <div class="row">
                                    <div class="col-lg-12">

                                        <br>


                                        <h4 class="text-center">INFORMASI PEMBELI / PENERIMA BARANG</h4>
                                        <?php
                                        include 'koneksi.php';
                                        if (isset($_SESSION['keranjang'])) {

                                            $jumlah_isi_keranjang = count($_SESSION['keranjang']);

                                            if ($jumlah_isi_keranjang != 0) {
                                                $jumlah_total = 0;
                                                $total = 0;
                                                for ($a = 0; $a < $jumlah_isi_keranjang; $a++) {
                                                    $id_produk = $_SESSION['keranjang'][$a]['produk'];
                                                    $jml = $_SESSION['keranjang'][$a]['jumlah'];

                                                    $isi = mysqli_query($koneksi, "select * from produk where produk_id='$id_produk'");
                                                    $i = mysqli_fetch_assoc($isi);

                                                    $total += $i['produk_harga'] * $jml;
                                                    $jumlah_total += $total;
                                        ?>

                                                    <div class="form-group">

                                                    </div>

                                                <?php } ?>

                                        <?php }
                                        } ?>

                                        <?php
                                        $id = $_SESSION['customer_id'];
                                        $data = mysqli_query($koneksi, "SELECT * FROM customer where customer_id='$id'");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>

                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="input" name="nama" value="<?= $d['customer_nama'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Nomor HP</label>
                                                <input type="number" class="input" name="hp" placeholder="" value="<?= $d['customer_hp'] ?>">
                                            </div>



                                            <?php
                                            $default = $d['alamat_default'];
                                            $provinsi1 = $d['customer_provinsi'];
                                            $provinsi2 = $d['customer_provinsi2'];
                                            $provinsi3 = $d['customer_provinsi3'];
                                            $kota1 = $d['customer_kota'];
                                            $kota2 = $d['customer_kota2'];
                                            $kota3 = $d['customer_kota3'];
                                            $alamat1 = $d['customer_alamat'];
                                            $alamat2 = $d['customer_alamat2'];
                                            $alamat3 = $d['customer_alamat3'];
                                            if ($default == 'option1') {
                                            ?>
                                                <div class="form-group">
                                                    <label>Alamat Lengkap</label>
                                                    <textarea name="alamat" class="form-control" style="resize: none;" rows="6"><?= $d['customer_alamat'] ?></textarea>
                                                </div>
                                                <?php

                                                $curl = curl_init();

                                                curl_setopt_array($curl, array(
                                                    CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=$provinsi1",
                                                    CURLOPT_RETURNTRANSFER => true,
                                                    CURLOPT_ENCODING => "",
                                                    CURLOPT_MAXREDIRS => 10,
                                                    CURLOPT_TIMEOUT => 30,
                                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                    CURLOPT_CUSTOMREQUEST => "GET",
                                                    CURLOPT_HTTPHEADER => array(
                                                        "key: 8f22875183c8c65879ef1ed0615d3371"
                                                    ),
                                                ));

                                                $response = curl_exec($curl);
                                                $err = curl_error($curl);
                                                $data_provinsi = json_decode($response, true);
                                                ?>

                                                <?php

                                                $curl = curl_init();

                                                curl_setopt_array($curl, array(
                                                    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$kota1&province=$provinsi1",
                                                    CURLOPT_RETURNTRANSFER => true,
                                                    CURLOPT_ENCODING => "",
                                                    CURLOPT_MAXREDIRS => 10,
                                                    CURLOPT_TIMEOUT => 30,
                                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                    CURLOPT_CUSTOMREQUEST => "GET",
                                                    CURLOPT_HTTPHEADER => array(
                                                        "key: 8f22875183c8c65879ef1ed0615d3371"
                                                    ),
                                                ));

                                                $response = curl_exec($curl);
                                                $err = curl_error($curl);
                                                $data_kota = json_decode($response, true);
                                                ?>

                                            <?php } elseif ($default == 'option2') { ?>
                                                <div class="form-group">
                                                    <label>Alamat Lengkap</label>
                                                    <textarea name="alamat" class="form-control" style="resize: none;" rows="6"><?= $d['customer_alamat2'] ?></textarea>
                                                </div>
                                                <?php

                                                $curl = curl_init();

                                                curl_setopt_array($curl, array(
                                                    CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=$provinsi2",
                                                    CURLOPT_RETURNTRANSFER => true,
                                                    CURLOPT_ENCODING => "",
                                                    CURLOPT_MAXREDIRS => 10,
                                                    CURLOPT_TIMEOUT => 30,
                                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                    CURLOPT_CUSTOMREQUEST => "GET",
                                                    CURLOPT_HTTPHEADER => array(
                                                        "key: 8f22875183c8c65879ef1ed0615d3371"
                                                    ),
                                                ));

                                                $response = curl_exec($curl);
                                                $err = curl_error($curl);
                                                $data_provinsi = json_decode($response, true);
                                                ?>

                                                <?php

                                                $curl = curl_init();

                                                curl_setopt_array($curl, array(
                                                    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$kota2&province=$provinsi2",
                                                    CURLOPT_RETURNTRANSFER => true,
                                                    CURLOPT_ENCODING => "",
                                                    CURLOPT_MAXREDIRS => 10,
                                                    CURLOPT_TIMEOUT => 30,
                                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                    CURLOPT_CUSTOMREQUEST => "GET",
                                                    CURLOPT_HTTPHEADER => array(
                                                        "key: 8f22875183c8c65879ef1ed0615d3371"
                                                    ),
                                                ));

                                                $response = curl_exec($curl);
                                                $err = curl_error($curl);
                                                $data_kota = json_decode($response, true);
                                                ?>
                                            <?php } elseif ($default == 'option3') { ?>
                                                <div class="form-group">
                                                    <label>Alamat Lengkap</label>
                                                    <textarea name="alamat" class="form-control" style="resize: none;" rows="6"><?= $d['customer_alamat3'] ?></textarea>
                                                </div>
                                                <?php

                                                $curl = curl_init();

                                                curl_setopt_array($curl, array(
                                                    CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=$provinsi3",
                                                    CURLOPT_RETURNTRANSFER => true,
                                                    CURLOPT_ENCODING => "",
                                                    CURLOPT_MAXREDIRS => 10,
                                                    CURLOPT_TIMEOUT => 30,
                                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                    CURLOPT_CUSTOMREQUEST => "GET",
                                                    CURLOPT_HTTPHEADER => array(
                                                        "key: 8f22875183c8c65879ef1ed0615d3371"
                                                    ),
                                                ));

                                                $response = curl_exec($curl);
                                                $err = curl_error($curl);
                                                $data_provinsi = json_decode($response, true);
                                                ?>

                                                <?php

                                                $curl = curl_init();

                                                curl_setopt_array($curl, array(
                                                    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$kota3&province=$provinsi3",
                                                    CURLOPT_RETURNTRANSFER => true,
                                                    CURLOPT_ENCODING => "",
                                                    CURLOPT_MAXREDIRS => 10,
                                                    CURLOPT_TIMEOUT => 30,
                                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                    CURLOPT_CUSTOMREQUEST => "GET",
                                                    CURLOPT_HTTPHEADER => array(
                                                        "key: 8f22875183c8c65879ef1ed0615d3371"
                                                    ),
                                                ));

                                                $response = curl_exec($curl);
                                                $err = curl_error($curl);
                                                $data_kota = json_decode($response, true);
                                                ?>
                                            <?php } ?>



                                        <?php
                                        }
                                        ?>

                                        <div class="form-group">
                                            <label>Provinsi Tujuan</label>
                                            <select name='provinsi1' id='provinsi1' class="input">
                                                <?php
                                                echo "<option selected value='" . $data_provinsi['rajaongkir']['results']['province_id'] . "'>" . $data_provinsi['rajaongkir']['results']['province'] . "</option>";
                                                ?>
                                            </select>
                                        </div>

                                        <input type="hidden" name='provinsi2' id='provinsi' class="input" value="<?= $data_provinsi['rajaongkir']['results']['province_id'] ?>">

                                        <input type="hidden" name='kabupaten2' id='kabupaten' class="input" value="<?= $data_kota['rajaongkir']['results']['city_id'] ?>">

                                        <div class="form-group">
                                            <label>Kota Tujuan</label>
                                            <select name='kabupaten1' id="kabupaten1" class="input">
                                                <?php
                                                echo "<option selected value='" . $data_kota['rajaongkir']['results']['city_id'] . "'>" . $data_kota['rajaongkir']['results']['city_name'] . "</option>";
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pembayaran Ongkir</label>
                                            <br>
                                            <input type="radio" id="cod" name="pembayaran" value="cod">
                                            <label for="cod">Bayar Cod</label>
                                            <br>
                                            <input type="radio" id="online" name="pembayaran" value="online">
                                            <label for="online">Bayar Online</label>

                                        </div>
                                        <div id="ongkir"></div>
                                        <input type="hidden" id="kurir" name="kurir" value="">
                                        <input type="hidden" id="service" name="service" value="">
                                        <br>

                                        <div class="form-group">
                                            <input type="checkbox" id="html" required>
                                            <label for="html">Saya setuju dengan <a data-toggle="modal" class="btn btn-info" data-target="#exampleModal">syarat & ketentuan
                                                    yang berlaku</a></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="pull-left">
                                            <a class="main-btn" href="keranjang.php">Kembali Ke Keranjang</a>
                                        </div>

                                        <div class="pull-right">
                                            <input type="submit" class="primary-btn" value="Buat Pesanan">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <?php
                                if (isset($_SESSION['keranjang'])) {

                                    $jumlah_isi_keranjang = count($_SESSION['keranjang']);

                                    if ($jumlah_isi_keranjang != 0) {

                                ?>


                                        <table class="shopping-cart-table table">
                                            <thead>
                                                <tr>
                                                    <th>Produk</th>
                                                    <th>Catatan</th>
                                                    <th class="text-center">Harga</th>
                                                    <th class="text-center">Jumlah</th>
                                                    <th class="text-center">Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                // cek apakah produk sudah ada dalam keranjang
                                                $jumlah_total = 0;
                                                $total = 0;
                                                for ($a = 0; $a < $jumlah_isi_keranjang; $a++) {
                                                    $id_produk = $_SESSION['keranjang'][$a]['produk'];
                                                    $jml = $_SESSION['keranjang'][$a]['jumlah'];

                                                    $isi = mysqli_query($koneksi, "select * from produk where produk_id='$id_produk'");
                                                    $i = mysqli_fetch_assoc($isi);

                                                    $total += $i['produk_harga'] * $jml;
                                                    $jumlah_total += $total;
                                                ?>

                                                    <tr>
                                                        <td>
                                                            <a href="produk_detail.php?id=<?php echo $i['produk_id'] ?>"><?php echo $i['produk_nama'] ?></a>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php echo $_SESSION['keranjang'][$a]['catatan']; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php echo "Rp. " . number_format($i['produk_harga']) . " ,-"; ?>
                                                        </td>
                                                        <td class="qty text-center">
                                                            <?php echo $_SESSION['keranjang'][$a]['jumlah']; ?>
                                                        </td>
                                                        <td class="text-center"><strong class="primary-color total_harga" id="total_<?php echo $i['produk_id'] ?>"><?php echo "Rp. " . number_format($total) . " ,-"; ?></strong>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    $total = 0;
                                                }

                                                ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="empty" colspan="3"></th>
                                                    <th>TOTAL BERAT</th>
                                                    <th class="text-center"><?php echo $total_berat; ?> Gram</th>
                                                </tr>
                                                <tr>
                                                    <th class="empty" colspan="3"></th>
                                                    <th>ONGKIR</th>
                                                    <th class="text-center"><span id="tampil_ongkir"><?php echo "Rp. 0 ,-"; ?></span></th>
                                                </tr>
                                                <tr>
                                                    <th class="empty" colspan="3"></th>
                                                    <th>TOTAL BAYAR</th>
                                                    <th class="text-center"><span id="tampil_total"><?php echo "Rp. " . number_format($jumlah_total) . " ,-"; ?></span>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <input name="berat" id="berat2" value="<?php echo $total_berat ?>" type="hidden">
                                        <input name="ongkir2" id="ongkir2" value="<?php echo $ongkir ?>" type="hidden">

                                        <input type="hidden" name="total_bayar" id="total_bayar" value="<?php echo $jumlah_total; ?>">

                                <?php
                                    } else {

                                        echo "<br><br><br><h3><center>Keranjang Masih Kosong. Yuk <a href='index.php'>belanja</a> !</center></h3><br><br><br>";
                                    }
                                } else {
                                    echo "<br><br><br><h3><center>Keranjang Masih Kosong. Yuk <a href='index.php'>belanja</a> !</center></h3><br><br><br>";
                                }
                                ?>

                            </div>
                        </form>


                    </div>






                </div>

            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->



<?php include 'footer.php'; ?>
