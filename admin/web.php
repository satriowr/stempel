<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      KONTROL WEBSITE
      <small>Data WEB</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-10 col-lg-offset-1">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">LIST KONTEN WEB</h3> &nbsp <a class="btn btn-info btn-sm" href="webindex_tambah.php"><i class="fa fa-plus"></i> Tambah Konten</a>
            <a href="web.php" class="btn btn-danger btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp PAGE HOME</a>
            <a href="produk_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp PAGE TENTANG KAMI</a>   
            <a href="produk_tambah.php" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp PAGE F.A.Q</a>                 
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>GAMBAR</th>
                    <th>KONTEN</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM indexweb order by indexweb_id desc");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td>
                        <center>
                          <?php if($d['indexweb_gambar'] == ""){ ?>
                            <img src="../gambar/sistem/produk.png" style="width: 80px;height: auto">
                          <?php }else{ ?>
                            <img src="../gambar/sistem/<?php echo $d['indexweb_gambar'] ?>" style="width: 80px;height: auto">
                          <?php } ?>
                        </center>
                      </td>
                      <td><?php echo $d['indexweb_konten']; ?></td>
                      <td>                        
                        <a class="btn btn-warning btn-sm" href="webindex_edit.php?id=<?php echo $d['indexweb_id'] ?>"><i class="fa fa-cog"></i></a>
                        <a class="btn btn-danger btn-sm" href="webindex_hapus.php?id=<?php echo $d['indexweb_id'] ?>"><i class="fa fa-trash"></i></a>
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
<?php include 'footer.php'; ?>