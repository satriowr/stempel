<?php include 'header.php'; ?>



<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Daftar Customer</li>
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
                        <h3 class="title">Pendaftaran Pelanggan Baru</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">

                            <form method="post" action="daftar_act.php">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" class="input" required="required" name="nama"
                                        placeholder="Masukkan nama lengkap ..">
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="input" required="required" name="email"
                                        placeholder="Masukkan email ..">
                                </div>

                                <div class="form-group">
                                    <label for="">Nomor HP / Whatsapp</label>
                                    <input type="number" class="input" required="required" name="hp"
                                        placeholder="Masukkan nomor HP/Whatsapp ..">
                                </div>

                                <?php


                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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

                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select name='customer_provinsi' id='provinsi' class="input">
                                        <option>Pilih Provinsi Tujuan</option>
                                        <?php
                                        for ($i = 0; $i < count($data_provinsi['rajaongkir']['results']); $i++) {
                                            echo "<option value='" . $data_provinsi['rajaongkir']['results'][$i]['province_id'] . "'>" . $data_provinsi['rajaongkir']['results'][$i]['province'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kota</label>
                                    <select id="kabupaten" name="customer_kota" class="input"></select>
                                </div>

                                <div class="form-group">
                                    <label for="">Alamat Lengkap</label>
                                    <input type="text" class="input" required="required" name="alamat"
                                        placeholder="Masukkan alamat lengkap ..">
                                </div>

                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="input" required="required" name="password"
                                        placeholder="Masukkan password ..">
                                    <small class="text-muted">Password ini digunakan untuk login ke akun anda.</small>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="html" required>
                                    <label for="html">Saya setuju dengan <a data-toggle="modal" class="btn btn-info"
                                            data-target="#exampleModal">syarat & ketentuan yang berlaku</a></label>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="primary-btn btn-block" style="background: #54b4c2;"
                                        value="Daftar">
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
                <br>

            </div>

        </div>
        <hr>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Syarat & Ketentuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                1. Periksa Kembali data pembelian anda<br>
                2. Pembelian yang sudah diproses tidak dapat dibatalkan<br>
                3. Barang yang sudah dibeli tidak dapat dikembalikan.
            </div>

        </div>
    </div>
</div>


<?php include 'footer.php'; ?>