<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Produk
      <small>Tambah Produk Baru</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Tambah Produk</h3>
            <a href="produk.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">

            <?php 
            $id = $_GET['id'];
            $data = mysqli_query($koneksi,"SELECT * FROM indexweb where indexweb_id='$id'");
            while($d = mysqli_fetch_array($data)){
              ?>

              <form action="webindex_update.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label>Gambar</label>
                  <input type="file" name="gambar">

                  <?php if($d['indexweb_gambar'] == ""){ ?>
                    <img src="../gambar/sistem/produk.png" style="width: 120px;height: auto">
                  <?php }else{ ?>
                    <img src="../gambar/produk/<?php echo $d['indexweb_gambar'] ?>" style="width: 120px;height: auto">
                  <?php } ?>

                  <br/>
                  <small class="text-muted">Kosongkan Jika Tidak Ingin Mengubah Foto</small>

                </div>

                <div class="form-group">
                  <label>Judul</label>
                  <input type="hidden" name="id" value="<?php echo $d['indexweb_id']; ?>">
                  <input type="text" class="form-control" name="judul" required="required" placeholder="Masukkan Nama .." value="<?php echo $d['indexweb_judul']; ?>">
                </div>

                <div class="form-group">
                  <label>Katerangan</label>
                  <textarea name="keterangan" class="form-control textarea" required="required" style="resize: none" rows="10"><?php echo $d['indexweb_konten']; ?></textarea>
                </div>

                

                <div class="form-group">
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
<?php include 'footer.php'; ?>