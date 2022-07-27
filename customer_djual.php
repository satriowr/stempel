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
				
				<h4>Data Barang</h4>

				<div id="store">
					<div class="row">

          <section class="content">
    <div class="row">
      <section class="col-lg-10 col-lg-offset-1">
        <div class="box box-info">
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NAMA PRODUK</th>
                    <th>KATEGORI</th>
                    <th>HARGA</th>
                    <th>JUMLAH</th>
                    <th width="15%">FOTO</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include 'koneksi.php';
                  $no=1;
                  $id= $_SESSION['customer_id'];
                  $data = mysqli_query($koneksi,"SELECT * FROM produk,kategori,customer where kategori_id=produk_kategori and '$id'=produk_idpenjual and customer_nama=produk_penjual");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['produk_nama']; ?></td>
                      <td><?php echo $d['kategori_nama']; ?></td>
                      <td><?php echo "Rp. ".number_format($d['produk_harga']).",-"; ?></td>
                      <td><?php echo number_format($d['produk_jumlah']); ?></td>
                      <td>
                        <center>
                          <?php if($d['produk_foto1'] == ""){ ?>
                            <img src="gambar/sistem/produk.png" style="width: 80px;height: auto">
                          <?php }else{ ?>
                            <img src="gambar/produk/<?php echo $d['produk_foto1'] ?>" style="width: 80px;height: auto">
                          <?php } ?>
                        </center>

                        <center>
                          <?php if($d['produk_foto2'] == ""){ ?>
                            <img src="gambar/sistem/produk.png" style="width: 80px;height: auto">
                          <?php }else{ ?>
                            <img src="gambar/produk/<?php echo $d['produk_foto2'] ?>" style="width: 80px;height: auto">
                          <?php } ?>
                        </center>

                        <center>
                          <?php if($d['produk_foto3'] == ""){ ?>
                            <img src="gambar/sistem/produk.png" style="width: 80px;height: auto">
                          <?php }else{ ?>
                            <img src="gambar/produk/<?php echo $d['produk_foto3'] ?>" style="width: 80px;height: auto">
                          <?php } ?>
                        </center>
                      </td>
                      <td>                        
                        <a class="btn btn-warning btn-sm" href="customer_dedit.php?id=<?php echo $d['produk_id'] ?>"><i class="fa fa-cog"></i></a>
                        <a class="btn btn-danger btn-sm" href="customer_dhapus.php?id=<?php echo $d['produk_id'] ?>"><i class="fa fa-trash"></i></a>
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
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>