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
      <section class="col-lg-12">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Tambah Konten Index</h3>
            <a href="web.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">

            <form action="webindex_act.php" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar">
              </div>

              <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control input" required="required" style="resize: none" rows="10">
             </div>

              <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control textarea" required="required" style="resize: none" rows="10"></textarea>
              </div>


              <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
              </div>

            </form>

          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>