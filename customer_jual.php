<?php include 'header.php'; ?>


<!-- BREADCRUMB -->
<div id="breadcrumb">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active">Jual Sesuatu</li>
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

        <h4>Jual Sesuatu</h4>

        <div id="store">
          <div class="row">

            <div class="col-lg-12">
              <?php
              if (isset($_GET['alert'])) {
                if ($_GET['alert'] == "sukses") {
                  echo "<div class='alert alert-success'>Password anda berhasil diganti!</div>";
                }
              }
              ?>

              <section class="content">
                <div class="row">
                  <section class="col-lg-12">
                    <div class="box box-info">
                      <div class="box-body">

                        <form action="jual_act.php" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <?php
                            $id = $_SESSION['customer_id'];
                            $customer = mysqli_query($koneksi, "select * from customer where customer_id='$id'");
                            while ($i = mysqli_fetch_array($customer)) {
                            ?>
                              <label>Id Penjual</label>
                              <input type="text" class="form-control" name="idpenjual" required="required" value="<?php echo $i['customer_id'] ?>" readonly>
                          </div>
                          <div class="form-group">

                            <label>Nama Penjual</label>
                            <input type="text" class="form-control" name="penjual" required="required" value="<?php echo $i['customer_nama'] ?>" readonly>
                          </div>

                          <label>Nomor Penjual</label>
                          <input type="text" class="form-control" name="npenjual" required="required" value="<?php echo $i['customer_hp'] ?>" readonly>
                      </div>
                    <?php
                            }
                    ?>

                    <div class="form-group">
                      <label>Nama Produk</label>
                      <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama ..">
                    </div>

                    <div class="form-group">
                      <label>Kategori Produk</label>
                      <div class="row">
                        <div class="col-lg-4">
                          <select name="kategori" required="required" class="form-control">
                            <option value="">- Pilih Kategori Produk -</option>
                            <?php
                            include 'koneksi.php';
                            $data = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                              <option value="<?php echo $d['kategori_id']; ?>"><?php echo $d['kategori_nama']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Harga</label>
                      <div class="row">
                        <div class="col-lg-4">
                          <input type="number" class="form-control" name="harga" required="required" placeholder="Masukkan Harga ..">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea name="keterangan" class="form-control textarea" required="required" style="resize: none" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Berat Produk (gram)</label>
                      <div class="row">
                        <div class="col-lg-4">
                          <input type="number" class="form-control" name="berat" required="required" placeholder="Masukkan Berat ..">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Jumlah Stock</label>
                      <div class="row">
                        <div class="col-lg-4">
                          <input type="number" class="form-control" name="jumlah" required="required" placeholder="Masukkan Jumlah ..">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Foto 1 (Foto Utama)</label>
                      <input type="file" name="foto1">
                    </div>

                    <div class="form-group">
                      <label>Foto 2</label>
                      <input type="file" name="foto2">
                    </div>

                    <div class="form-group">
                      <label>Foto 3</label>
                      <input type="file" name="foto3">
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-sm btn-primary" value="Jual">
                    </div>

                    </form>

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
</div>

<?php include 'footer.php'; ?>