<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active" style="color:#54b4c2;">Akun Saya</li>
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

                <h4>Pengaturan Akun</h4>

                <div id="store">

                    <div class="row">

                        <div class="col-lg-12">



                            <table class="table table-bordered">
                                <tbody>
                                    <?php
                                    $id = $_SESSION['customer_id'];
                                    $customer = mysqli_query($koneksi, "select * from customer where customer_id='$id'");
                                    while ($i = mysqli_fetch_array($customer)) {
                                    ?>
                                        <h5>Halo , Selamat Datang, <?php echo $i['customer_nama'] ?> </h5>
                                        <tr>
                                            <th width="20%">Nama</th>
                                            <td><?php echo $i['customer_nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <th width="20%">Email</th>
                                            <td><?php echo strtoupper($i['customer_email']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>HP</th>
                                            <td><?php echo $i['customer_hp'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Pengiriman</th>
                                            <td><?php echo $i['customer_alamat'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <div class="form-group">
                                        <a class="btn btn-sm btn-primary" style="background: #54b4c2;" href="customer_edit.php">EDIT DATA USER</a>
                                    </div>
                                    <div class="form-group">
                                        <a class="btn btn-sm btn-primary" style="background: #54b4c2;" data-toggle="modal" data-target="#tambahAlamat">Tambah Alamat Pengiriman</a>
                                        <small class="text-danger">*Anda dapat Menambahkan Alamat Pengiriman Maks 3
                                            alamat.</small>
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
                                                    <form action="pilih_alamat.php" method="POST">
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
                                                                <button class="btn btn-primary btn-sm" type="submit">Pilih Sebagai Alamat
                                                                    Pengiriman</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="tambahAlamat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Alamat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="tambah_alamat.php" method="POST">
                                                        <input type="hidden" value="<?= $_SESSION['customer_id']; ?>" name="id">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <?php


                                                                $curl = curl_init();

                                                                curl_setopt_array($curl, array(
                                                                    CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
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
                                                                        <option>Pilih Provinsi</option>
                                                                        <?php
                                                                        for ($i = 0; $i < count($data_provinsi['rajaongkir']['results']); $i++) {
                                                                            echo "<option value='" . $data_provinsi['rajaongkir']['results'][$i]['province_id'] . "'>" . $data_provinsi['rajaongkir']['results'][$i]['province'] . "</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Kota</label>
                                                                    <select id="kabupaten" name="customer_kota" class="input"></select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="customer_alamat">Alamat Lengkap</label>
                                                                    <textarea class="form-control" name="customer_alamat" id="customer_alamat" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-umbrella" aria-hidden="true"></i>
                                                                    Tambah Data</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12">
                            asd
                        </div>


                    </div>
                </div>

            </div>

        </div><br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <hr>
    </div>
</div>

<?php include 'footer.php'; ?>
