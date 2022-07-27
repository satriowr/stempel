n<?php include 'header.php'; ?>

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
      <section class="col-lg-6">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Yakin Ingin Membatalkan Pesanan ?</h3>
          </div>
          <div class="box-body">
            <p>Dengan membatalkan, semua data produk serta invoice tidak dapat dikembalikan!.</p>
            <br/>
            <a href="customer_pesanan.php" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
            <?php 
            $idd = $_GET['id'];
            ?>
            <a href="customer_hpesanan.php?id=<?php echo $idd; ?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-check"></i> &nbsp Hapus</a> 
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