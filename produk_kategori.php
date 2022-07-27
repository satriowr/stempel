<?php include 'header.php'; ?>


<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Kategori</li>
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

            <!-- MAIN -->
            <div id="main" class="col-md-12">





                <?php
				 if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $kategori = mysqli_query($koneksi, "SELECT * from produk,kategori where kategori_id=produk_kategori and produk_nama like '%$cari%' order by produk_harga asc");
        if(isset($_GET['cari'])){
								$cari = $_GET['cari'];
								$data = mysqli_query($koneksi,"SELECT * from produk,kategori where kategori_id=produk_kategori and produk_nama like '%$cari%' order by produk_harga desc");
							}else{
								$data = mysqli_query($koneksi,"SELECT * from produk,kategori where kategori_id=produk_kategori order by produk_harga desc");
							}
							while ($d = mysqli_fetch_array($data)) {
    ?>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span><?php echo $d['kategori_nama'] ?></span>
                            </div>

                            <a href="produk_detail.php?id=<?php echo $d['produk_id'] ?>" class="main-btn quick-view"><i
                                    class="fa fa-search-plus"></i> Lihat</a>

                            <?php if ($d['produk_foto1'] == "") {?>
                            <img src="gambar/sistem/produk.png" style="height: 250px">
                            <?php } else {?>
                            <img src="gambar/produk/<?php echo $d['produk_foto1'] ?>" style="height: 250px">
                            <?php }?>
                        </div>
                        <div class="product-body">
                            <h3 class="product-price"><?php echo "Rp. " . number_format($d['produk_harga']) . ",-"; ?>
                                <?php if ($d['produk_jumlah'] == 0) {?> <del class="product-old-price">Kosong</del>
                                <?php }?></h3>
                            <h3 class="product-name"><a
                                    href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><?php echo $d['produk_nama']; ?></a>
                            </h3>
                            <div class="product-btns">
                                <br>
                                <a class="main-btn btn-block text-center"
                                    href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><i
                                        class="fa fa-search"></i> Lihat</a>

                                <!-- <a class="primary-btn add-to-cart btn-block text-center" href="keranjang_masukkan.php?id=<?php echo $d['produk_id']; ?>&redirect=index"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</a> -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->

                <?php
}


    } else {
				$id = $_GET['id'];

        $kategori = mysqli_query($koneksi,"SELECT * from kategori where kategori_id='$id'");
				$k = mysqli_fetch_assoc($kategori); ?>
                <div class="pull-left">
                    <h4>Kategori Produk : <?php echo $k['kategori_nama']; ?></h4>
                </div>


                <!-- store top filter -->
                <form action="" method="get">
                    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id">

                    <div class="store-filter clearfix">
                        <div class="pull-right">
                            <div class="sort-filter">
                                <span class="text-uppercase">Urutkan :</span>
                                <select class="input" name="urutan" onchange="this.form.submit()">
                                    <option
                                        <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "terbaru"){echo "selected='selected'";} ?>
                                        value="terbaru">Terbaru</option>
                                    <option
                                        <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "hargaterendah"){echo "selected='selected'";} ?>
                                        value="hargaterendah">Harga Terendah</option>
                                    <option
                                        <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "hargatertinggi"){echo "selected='selected'";} ?>
                                        value="hargatertinggi">Harga Tertinggi</option>
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
						$kategori = $_GET['id'];

						$halaman = 24;
						$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
						$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
						$result = mysqli_query($koneksi, "SELECT * FROM produk WHERE produk_stat IS NULL ");
						$total = mysqli_num_rows($result);
						$pages = ceil($total/$halaman);  
						if(isset($_GET['urutan']) && $_GET['urutan'] == "hargaterendah"){
							$data = mysqli_query($koneksi,"SELECT * from produk,kategori where produk_stat IS NULL AND kategori_id='$kategori' and kategori_id=produk_kategori order by produk_harga ASC LIMIT $mulai, $halaman");
						} elseif (isset($_GET['urutan']) && $_GET['urutan'] == "hargatertinggi"){
							$data = mysqli_query($koneksi,"SELECT * from produk,kategori where produk_stat IS NULL AND kategori_id='$kategori' and kategori_id=produk_kategori order by produk_harga DESC LIMIT $mulai, $halaman");
						} else {
							$data = mysqli_query($koneksi,"SELECT * from produk,kategori where produk_stat IS NULL AND kategori_id='$kategori' and kategori_id=produk_kategori order by produk_id desc LIMIT $mulai, $halaman");
						}        
						$no =$mulai+1;

						while($d = mysqli_fetch_array($data)){
							?>

                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span><?php echo $d['kategori_nama'] ?></span>
                                    </div>

                                    <a href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"
                                        class="main-btn quick-view"><i class="fa fa-search-plus"></i> Lihat </a>

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
                                    <!--<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o empty"></i>
										</div> -->
                                    <h2 class="product-name"><a
                                            href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><?php echo $d['produk_nama']; ?></a>
                                    </h2>
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


                        <?php 
						if(mysqli_num_rows($data) == 0){
							echo "<center><h3>Belum Ada Produk</h3></center>";
						}
						?>

                    </div>
                    <!-- /row -->
                </div>
                <!-- /STORE -->


                <div class="store-filter clearfix">
                    <div class="pull-right">
                        <ul class="store-pages">
                            <li><span class="text-uppercase">Page:</span></li>
                            <?php for ($i=1; $i<=$pages ; $i++){ ?>
                            <?php if($page==$i){ ?>
                            <li class="active"><?php echo $i; ?></li>
                            <?php }else{ ?>

                            <?php 
									if(isset($_GET['urutan']) && $_GET['urutan'] == "harga"){
										?>
                            <li><a href="?halaman=<?php echo $i; ?>&urutan=harga"><?php echo $i; ?></a></li>
                            <?php 
									}else{
										?>
                            <li><a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php
									}
									?>

                            <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <?php }
				
				?>
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



                    </div>
                    <!-- /MAIN -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->

        <?php include 'footer.php'; ?>