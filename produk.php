<?php include 'header.php'; ?>


<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">

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

            <?php 
					if(isset($_GET['alert'])){
						if($_GET['alert'] == "suksesrating"){
							echo "<div class='alert alert-success text-center'>Berhasil Memberi Ulasan</div>";
						}elseif($_GET['alert'] == "gagalrating"){
							echo "<div class='alert alert-danger text-center'>Gagal Memberi Ulasan</div>";
						}
					}
					?>

            <!-- MAIN -->
            <div id="main" class="col-md-12">

                <!-- store top filter -->
                <form action="" method="get">
                    <div class="pull-left">
                        <h2 class="title">Produk</h2>
                    </div>
                    <div class="store-filter clearfix">
                        <div class="pull-right">
                            <div class="sort-filter">
                                <span class="text-uppercase">Urutkan :</span>
                                <select class="input" name="urutan" onchange="this.form.submit()">
                                    <option
                                        <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "terbaru"){echo "selected='selected'";} ?>
                                        value="terbaru">Terbaru</option>
                                    <!--<option <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "terlaris"){echo "selected='selected'";} ?> value="terlaris">Terlaris</option> -->
                                    <option
                                        <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "hargaterendah"){echo "selected='selected'";} ?>
                                        value="hargaterendah">Harga Terendah</option>
                                    <option
                                        <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "hargatertinggi"){echo "selected='selected'";} ?>
                                        value="hargatertinggi">Harga Tertinggi</option>
                                    <option
                                        <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "terlaris"){echo "selected='selected'";} ?>
                                        value="terlaris">Produk Terlaris</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /store top filter -->

                <!-- STORE -->
                <div id="store">
                    <!-- row -->
                    <div class="row">

                        <?php
				$batas =24;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				$data = mysqli_query($koneksi,"SELECT * FROM produk WHERE produk_stat IS NULL");
				
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
				
						if (isset($_GET['urutan']) && $_GET['urutan'] == "hargaterendah"){
							if(isset($_GET['cari'])){
								$cari = $_GET['cari'];
								$data = mysqli_query($koneksi,"SELECT * from produk,kategori WHERE produk_stat IS NULL AND kategori_id=produk_kategori and produk_nama like '%$cari%' order by produk_harga asc LIMIT $halaman_awal, $batas");
							}else{
								$data = mysqli_query($koneksi,"SELECT * from produk,kategori WHERE produk_stat IS NULL AND kategori_id=produk_kategori order by produk_harga asc LIMIT $halaman_awal, $batas");
							}
						} elseif (isset($_GET['urutan']) && $_GET['urutan'] == "hargatertinggi") {
							if(isset($_GET['cari'])){
								$cari = $_GET['cari'];
								$data = mysqli_query($koneksi,"SELECT * from produk,kategori WHERE produk_stat IS NULL AND kategori_id=produk_kategori and produk_nama like '%$cari%' order by produk_harga desc LIMIT $halaman_awal, $batas");
							}else{
								$data = mysqli_query($koneksi,"SELECT * from produk,kategori WHERE produk_stat IS NULL AND kategori_id=produk_kategori order by produk_harga desc LIMIT $halaman_awal, $batas");
							}
						} elseif (isset($_GET['urutan']) && $_GET['urutan'] == "terlaris") {
							if(isset($_GET['cari'])){
								$cari = $_GET['cari'];
								$data = mysqli_query($koneksi,"SELECT * from produk,kategori WHERE produk_stat IS NULL AND kategori_id=produk_kategori and produk_nama like '%$cari%' order by produk_harga desc LIMIT $halaman_awal, $batas");
							}else{
								$data = mysqli_query($koneksi,"SELECT * from produk,kategori,history WHERE produk_stat IS NULL AND kategori_id=produk_kategori and history_produk=produk_id group by produk_id order by history_produk desc limit $halaman_awal, $batas");
							}
						} else {

							if(isset($_GET['cari'])){
								$cari = $_GET['cari'];
								$data = mysqli_query($koneksi,"SELECT * from produk,kategori WHERE produk_stat IS NULL AND kategori_id=produk_kategori and produk_nama like '%$cari%' order by produk_id desc LIMIT $halaman_awal, $batas");
							}else{
								$data = mysqli_query($koneksi,"SELECT * from produk,kategori WHERE produk_stat IS NULL AND kategori_id=produk_kategori order by produk_id desc LIMIT $halaman_awal, $batas");
							}

						}  

						$nomor = $halaman_awal+1;
						while($d = mysqli_fetch_array($data)){
							?>


                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span><?php echo $d['kategori_nama'] ?></span>
                                    </div>


                                    <a href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"
                                        class="main-btn quick-view"><i class="fa fa-search-plus"></i> Lihat</a>

                                    <?php if($d['produk_foto1'] == ""){ ?>
                                    <img src="gambar/sistem/produk.png" style="height: 250px">
                                    <?php }else{ ?>
                                    <img src="gambar/produk/<?php echo $d['produk_foto1'] ?>" style="height: 250px">
                                    <?php } ?>
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">
                                        <?php echo "Rp. ".number_format($d['produk_harga']).",-"; ?>
                                        <?php if($d['produk_jumlah'] == 0){?> <del
                                            class="product-old-price">Kosong</del> <?php } ?></h3>
                                    <h3 class="product-name"><a
                                            href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><?php echo $d['produk_nama']; ?></a>
                                    </h3>
                                    <div class="product-btns">
                                        <br>
                                       
                                        <?php if ($d['produk_jumlah'] !== '0') {  ?>
                                       <a class="main-btn btn-block text-center"
                                            href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><i
                                                class="fa fa-search"></i> Lihat</a>
                                        <?php } else { ?>
                                        <a href="#" class="danger-btn btn-block text-center"> Produk Habis</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Single -->

                        <?php 
						}
						?>

                    </div>
                    <!-- /row -->
                </div>
                <!-- /STORE -->


                <div class="store-filter clearfix">
                    <div class="pull-right">
                        <ul class="store-pages">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link"
                                        <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                                </li>
                                <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?>
                                <li class="page-item"><a class="page-link"
                                        href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                <?php
				}
				?>
                                <li class="page-item">
                                    <a class="page-link"
                                        <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                                </li>
                            </ul>
                        </ul>
                    </div>
                </div>
                <hr>
                <div id="main" class="col-md-12">
                    <h2 class="title">Kategori</h2>
                    <hr>

                    <div class="d-flex justify-content-center">

                        <div class="row d-flex justify-content-center" style="margin-bottom:50px;">
                            <?php
$data = mysqli_query($koneksi, "SELECT * FROM kategori");
while ($d = mysqli_fetch_array($data)) {?>
                            <div class="col-md-4">
                                <div class="d-flex justify-content-center">
                                    <figure class="figure w-25">
                                        <div class="text-center">
                                            <a href="produk_kategori.php?id=<?=$d['kategori_id'];?>">
                                                <img src="gambar/sistem/<?=$d['kategori_pict']?>" style="width:30%;">
                                            </a>
                                        </div>
                                        <figcaption class="figure-caption text-center font-weight-bold"
                                            style="padding-top:14px;">
                                            <h4><?=$d['kategori_nama'];?></h4>
                                        </figcaption>
                                    </figure>
                                </div>

                            </div>
                            <?php }?>

                        </div>
                        <hr>
                        <!-- /MAIN -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /section -->

            <?php include 'footer.php'; ?>