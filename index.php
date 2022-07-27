<?php include 'header.php'; ?>


<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">

        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- HOME -->
<div id="home">

    <!-- container -->
    <div class="container-fluid">


        <div class="row">
            <div class="col-md-12">
                <!-- home slick -->
                <div id="home-slick">
                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="gambar/sistem/ini.png" alt="">
                        <div class="banner-caption text-center" style="background-color: rgba(236, 240, 241, 1); padding: 5rem; border-radius: 45px; box-shadow: 0 30px 65px 0">
                            <h1 style="color: black;">SELAMAT DATANG <br> Di Toko Stempel Kediri</h1>
                            <h3 class="black-color font-weak">Jln Penanggungan 45H, Bandar Lor, Kec. Mojoroto, SUNSET CAFE kediri Jawa Timur 64117 Indonesia
Bandar Lor, Mojoroto, Kota Kediri
Kode Pos 64117</h3>
                            <a class="primary-btn" href="produk.php" style="background: #54b4c2;">Yuk Belanja</a>
                        </div>
                    </div>

                    <!-- <div class="banner banner-1">
	<img src="https://i.pinimg.com/originals/e7/b6/6c/e7b66c0755863cd8edc57e366add1b0a.jpg" alt="">
	<div class="banner-caption text-center">
			<h1 style="color: white;">Marketplace Dengan Tema Nusantara</h1>
			<h3 class="white-color font-weak">Official Website </h3>

			<a class="primary-btn" href="produk.php">Yuk Belanja</a>
		</div>
	</div> -->

                    <!-- /banner -->
                </div>

                <!-- /home slick -->
            </div>
        </div>


    </div>
    <!-- /container -->
</div>
<!-- /HOME -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <?php
            // include 'sidebar.php';
            ?>
            <style>
            .image-parent {
                background-color: $grey;
                max-width: 400px;
                min-height: 300px;
            }

            .img-wrapper {
                width: 10%;
                margin: 0rem 1.5rem 0rem 0rem;
            }

            .img-wrapper-20 {
                width: 20%;
                margin: 0rem 1.5rem 0rem 0rem;
            }

            .c-container {
                background-color: $grey;
                border-radius: 0.5rem;
                padding: 1.2rem 1.2rem;
                margin: 1rem 0rem;
            }

            .overlay-dark {
                background-color: rgba(black, 0.4);
            }

            .overlay-grey {
                background-color: rgba(#596164, 0.4);
            }

            .overlay-yellow {
                background-color: rgba(#fee140, 0.4);
            }

            .overlay-orange {
                background-color: rgba(#c43a30, 0.4);
            }

            .overlay-blue-gradient {
                background-image: linear-gradient(135deg, rgba(#96deda, 0.5) 0%, rgba(#537895, 0.7) 100%);
            }
            </style>
            <!-- MAIN -->
            <div id="main" class="col-md-12">
                <h2 class="title">Kategori</h2>
                <hr>

                <div class="d-flex justify-content-center">

                    <div class="row d-flex justify-content-center" style="margin-bottom:50px;">
                        <?php
                        $data = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while ($d = mysqli_fetch_array($data)) { ?>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-center">
                                <figure class="figure w-25">
                                    <div class="text-center">
                                        <a href="produk_kategori.php?id=<?= $d['kategori_id']; ?>">
                                            <img src="gambar/sistem/<?= $d['kategori_pict'] ?>" style="width:30%;">
                                        </a>
                                    </div>
                                    <figcaption class="figure-caption text-center font-weight-bold"
                                        style="padding-top:14px;">
                                        <h4><?= $d['kategori_nama']; ?></h4>
                                    </figcaption>
                                </figure>
                            </div>

                        </div>
                        <?php } ?>

                    </div>
                    <!-- store top filter -->
                    <hr>
                    <h2 class="title">Produk Terlaris</h2>


                    <!-- /store top filter -->

                    <!-- STORE -->
                    <div id="store">
                        <!-- row -->
                        <div class="row">

                            <?php
                            $batas = 4;
                            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;
                            $data = mysqli_query($koneksi, "SELECT * from produk,kategori,history WHERE produk_stat IS NULL AND kategori_id=produk_kategori and history_produk=produk_id group by produk_id");

                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);
                            $nomor = $halaman_awal + 1;
                            if (isset($_GET['urutan']) && $_GET['urutan'] == "harga") {
                                if (isset($_GET['cari'])) {
                                    $cari = $_GET['cari'];
                                    $datuy = mysqli_query($koneksi, "SELECT * from produk,kategori where kategori_id=produk_kategori and produk_nama like '%$cari%' order by produk_harga asc LIMIT $halaman_awal, $batas");
                                } else {
                                    $datuy1 = mysqli_query($koneksi, "SELECT * from produk,kategori,history WHERE produk_stat IS NULL AND kategori_id=produk_kategori and history_produk=produk_id order by history_produk desc limit $halaman_awal, $batas");
                                    $counts = mysqli_num_rows($datuy1);
                                    if ($counts <= 3) {
                                        $datuy = mysqli_query($koneksi, "SELECT * from produk WHERE produk_id = 0");
                                    } elseif ($counts >= 4) {
                                        $datuy = mysqli_query($koneksi, "SELECT * from produk,kategori,history WHERE produk_stat IS NULL AND kategori_id=produk_kategori and history_produk=produk_id group by produk_id order by history_produk desc limit $halaman_awal, $batas");
                                    }
                                }
                            } else {

                                if (isset($_GET['cari'])) {
                                    $cari = $_GET['cari'];
                                    $datuy = mysqli_query($koneksi, "SELECT * from produk,kategori where kategori_id=produk_kategori and produk_nama like '%$cari%' order by produk_id asc LIMIT $halaman_awal, $batas");
                                } else {
                                    $datuy1 = mysqli_query($koneksi, "SELECT * from produk,kategori,history WHERE produk_stat IS NULL AND kategori_id=produk_kategori and history_produk=produk_id order by history_produk desc limit $halaman_awal, $batas");
                                    $counts = mysqli_num_rows($datuy1);
                                    if ($counts <= 3) {
                                        $datuy = mysqli_query($koneksi, "SELECT * from produk WHERE produk_id = 0");
                                    } elseif ($counts >= 4) {
                                        $datuy = mysqli_query($koneksi, "SELECT * from produk,kategori,history WHERE produk_stat IS NULL AND kategori_id=produk_kategori and history_produk=produk_id group by produk_id order by history_produk desc limit $halaman_awal, $batas");
                                    }
                                }
                            }
                            // $datuy = mysqli_query($koneksi,"SELECT * from produk,kategori,history WHERE produk_stat IS NULL AND kategori_id=produk_kategori and history_produk=produk_id group by produk_id order by history_produk desc limit $halaman_awal, $batas");
                            while ($d = mysqli_fetch_array($datuy)) {
                            ?>

                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="product product-single">
                                    <div class="product-thumb">
                                        <div class="product-label">
                                            <span><?php echo $d['kategori_nama'] ?></span>
                                        </div>

                                        <a href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"
                                            class="main-btn quick-view"><i class="fa fa-search-plus"></i> Lihat</a>

                                        <?php if ($d['produk_foto1'] == "") { ?>
                                        <img src="gambar/sistem/produk.png" style="height: 250px">
                                        <?php } else { ?>
                                        <img src="gambar/produk/<?php echo $d['produk_foto1'] ?>" style="height: 250px">
                                        <?php } ?>
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-price">
                                            <?php echo "Rp. " . number_format($d['produk_harga']) . ",-"; ?>
                                            <?php if ($d['produk_jumlah'] == 0) { ?> <del
                                                class="product-old-price">Kosong</del> <?php } ?></h3>
                                        <h3 class="product-name"><a
                                                href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><?php echo $d['produk_nama']; ?></a>
                                        </h3>
                                        <div class="product-btns">
                                            <br>
                                            <a class="main-btn btn-block text-center"
                                                href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><i
                                                    class="fa fa-search"></i> Lihat</a>

                                            <!-- <a class="primary-btn add-to-cart btn-block text-center" style="background: #54b4c2;" href="keranjang_masukkan.php?id=&redirect=index"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</a> -->
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
                                    <li><a class="page-link" <?php echo "href='produk.php?urutan=terlaris';" ?>> Lihat
                                            Semua </a></li>
                                    <li class="page-item">
                                        <a class="page-link" <?php if ($halaman > 1) {
                                                                    echo "href='?halaman=$previous'";
                                                                } ?>>Previous</a>
                                    </li>
                                    <?php
                                    for ($x = 1; $x <= $total_halaman; $x++) {
                                    ?>
                                    <li class="page-item"><a class="page-link"
                                            href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                    echo "href='?halaman=$next'";
                                                                } ?>>Next</a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                    <hr>

                    <div class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">
                                <!-- section title -->
                                <div class="col-md-12">
                                    <div class="section-title">
                                        <h2 class="">Produk Terbaru</h2>
                                    </div>
                                </div>
                                <!-- section title -->


                                <?php
                                // $data = mysqli_query($koneksi, "select * from produk,kategori where kategori_id=produk_kategori order by produk_id desc limit 4");
                                $batus = 4;
                                $halamun = isset($_GET['halamun']) ? (int)$_GET['halamun'] : 1;
                                $halamun_awal = ($halamun > 1) ? ($halamun * $batus) - $batus : 0;

                                $previous = $halamun - 1;
                                $next = $halamun + 1;
                                $data = mysqli_query($koneksi, "SELECT * from produk,kategori where kategori_id=produk_kategori order by produk_harga desc");

                                $jumlah_data = mysqli_num_rows($data);
                                $total_halamun = ceil($jumlah_data / $batus);
                                $nomor = $halamun_awal + 1;
                                if (isset($_GET['urutan']) && $_GET['urutan'] == "harga") {
                                    if (isset($_GET['cari'])) {
                                        $cari = $_GET['cari'];
                                        $data = mysqli_query($koneksi, "SELECT * from produk,kategori where kategori_id=produk_kategori and produk_nama like '%$cari%' order by produk_harga asc LIMIT $halamun_awal, $batus");
                                    } else {
                                        $data = mysqli_query($koneksi, "SELECT * from produk,kategori where kategori_id=produk_kategori order by produk_harga asc LIMIT $halamun_awal, $batus");
                                    }
                                } else {

                                    if (isset($_GET['cari'])) {
                                        $cari = $_GET['cari'];
                                        $data = mysqli_query($koneksi, "SELECT * from produk,kategori where kategori_id=produk_kategori and produk_nama like '%$cari%' order by produk_id asc LIMIT $halamun_awal, $batus");
                                    } else {
                                        $data = mysqli_query($koneksi, "SELECT * from produk,kategori where kategori_id=produk_kategori order by produk_id desc LIMIT $halamun_awal, $batus");
                                    }
                                }
                                $nomor = $halamun_awal + 1;
                                while ($d = mysqli_fetch_array($data)) {
                                ?>

                                <div class="col-md-3 col-sm-6 col-xs-6">
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <div class="product-label">
                                                <span><?php echo $d['kategori_nama'] ?></span>
                                            </div>

                                            <a href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"
                                                class="main-btn quick-view"><i class="fa fa-search-plus"></i> Lihat </a>

                                            <?php if ($d['produk_foto1'] == "") { ?>
                                            <img src="gambar/sistem/produk.png" style="height: 250px">
                                            <?php } else { ?>
                                            <img src="gambar/produk/<?php echo $d['produk_foto1'] ?>"
                                                style="height: 250px">
                                            <?php } ?>
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price">
                                                <?php echo "Rp. " . number_format($d['produk_harga']) . ",-"; ?>
                                                <?php if ($d['produk_jumlah'] == 0) { ?> <del
                                                    class="product-old-price">Kosong</del> <?php } ?></h3>
                                            <h3 class="product-name"><a
                                                    href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><?php echo $d['produk_nama']; ?></a>
                                            </h3>
                                            <div class="product-btns">
                                                <br>
                                                <a class="main-btn btn-block text-center"
                                                    href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><i
                                                        class="fa fa-search"></i> Lihat</a>
                                                <?php if ($d['produk_jumlah'] !== '0') {  ?>
                                                <!-- <a class="primary-btn add-to-cart btn-block text-center"  style="background: #54b4c2;" href="keranjang_masukkan.php?id=<?php echo $d['produk_id']; ?>&redirect=index"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</a>  -->
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
                            <hr>
                            <div class="store-filter clearfix">
                                <div class="pull-right">
                                    <ul class="store-pages">
                                        <ul class="pagination justify-content-center">
                                            <li><a class="page-link" <?php echo "href='produk.php';" ?>> Lihat Semua
                                                </a></li>
                                            <li class="page-item">
                                                <a class="page-link" <?php if ($halamun > 1) {
                                                                            echo "href='?halamun=$previous'";
                                                                        } ?>>Previous</a>
                                            </li>

                                            <?php
                                            for ($x = 1; $x <= $total_halamun; $x++) {
                                            ?>
                                            <li class="page-item"><a class="page-link"
                                                    href="?halamun=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                            <?php
                                            }
                                            ?>
                                            <li class="page-item">
                                                <a class="page-link" <?php if ($halamun < $total_halamun) {
                                                                            echo "href='?halamun=$next'";
                                                                        } ?>>Next</a>
                                            </li>
                                        </ul>

                                    </ul>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <!-- /container -->
                    </div>

                </div>
                <!-- /MAIN -->




                <!-- MAIN -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->


    <?php include 'footer.php'; ?>
