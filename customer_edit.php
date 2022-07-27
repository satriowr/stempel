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
			
<!-- ASIDE -->
<div id="aside" class="col-md-3">

  <div class="aside">
    <ul>
      <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer.php"> <i class="fa fa-home"></i> &nbsp; Akun Saya</a></li>
      <!-- <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_jual.php"> <i class="fa fa-dollar"></i> &nbsp; jual Barang</a></li> -->
      <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_pesanan.php"> <i class="fa fa-list"></i> &nbsp; Pesanan Saya</a></li>
      <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_history.php"> <i class="fa fa-list"></i> &nbsp; History Pesanan Saya</a></li>
      <!-- <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_djual.php"> <i class="fa fa-list"></i> &nbsp; Barang Kamu</a></li> -->
      <!-- <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_sjual.php"> <i class="fa fa-info"></i> &nbsp; Konfirmasi Pesanan</a></li> -->
      <li style="margin-bottom: 10px"><a class="main-btn btn-block" href="customer_logout.php"> <i class="fa fa-sign-out"></i> &nbsp; Keluar</a></li>
    </ul>
  </div>
</div>
<!-- /ASIDE -->


			<div id="main" class="col-md-9">
				
				<h4>Data Pelanggan</h4>

				<div id="store">
					<div class="row">

          <section class="content">
    <div class="row">
      <section class="col-lg-6 col-lg-offset-3">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Edit Data Pelanggan</h3>
            
          </div>
          <div class="box-body">
            <?php 
            $id = $_SESSION['customer_id'];
            $data = mysqli_query($koneksi,"select * from customer where customer_id='$id'");
            while($d = mysqli_fetch_array($data)){
              ?>
              <form action="customer_update.php" method="post">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="hidden" name="id" value="<?php echo $d['customer_id']; ?>">
                  <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama customer.." value="<?php echo $d['customer_nama']; ?>">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" required="required" placeholder="Masukkan email customer.." value="<?php echo $d['customer_email']; ?>">
                </div>

                <div class="form-group">
                  <label>HP</label>
                  <input type="number" class="form-control" name="hp" required="required" placeholder="Masukkan no.hp customer.." value="<?php echo $d['customer_hp']; ?>">
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="alamat" required="required" placeholder="Masukkan alamat customer.." value="<?php echo $d['customer_alamat']; ?>">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Masukkan password customer..">
                  <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                </div>

                <div class="form-group">
                  <a href="customer.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
                  <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                </div>
              </form>
              <?php 
            }
            ?>

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

<?php include 'footer.php'; ?>