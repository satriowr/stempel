<?php include 'header.php'; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Supplier
            <small>Tambah Supplier Baru</small>
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
                        <h3 class="box-title">Tambah Supplier</h3>
                        <a href="supplier.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp
                            Kembali</a>
                    </div>
                    <div class="box-body">

                    <?php 
                        include '../koneksi.php';
                        $id = $_GET['id'];
                        $data = mysqli_query($koneksi,"select * from supplier where id_supplier='$id'");
                        while($d = mysqli_fetch_array($data)){
                    ?>

                        <form action="supplier_update.php" method="post" enctype="multipart/form-data">

                            <input type="hidden" value="<?php echo $d['id_supplier']; ?>" class="form-control" name="id" required="required"
                                    >

                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input type="text" value="<?php echo $d['nama_supplier']; ?>" class="form-control" name="nama" required="required"
                                    placeholder="Masukkan Nama ..">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" value="<?php echo $d['alamat']; ?>" class="form-control" name="alamat" required="required"
                                    placeholder="Masukkan Alamat ..">
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

<script>
// add row
$("#addRow").click(function() {
    var html = '';
    html += '<div class="form-group">';

    html += '<div id="inputFormRow">';
    html += '<div class="input-group mb-3">';
    html +=
        '<input type="text" name="catatan[]" class="form-control m-input" placeholder="Masukan Catatan" autocomplete="off">';
    html += '<div class="input-group-append">';
    html += '<button id="removeRow" type="button" class="btn btn-danger">Hapus</button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';

    $('#newRow').append(html);
});

// remove row
$(document).on('click', '#removeRow', function() {
    $(this).closest('#inputFormRow').remove();
});
</script>
<?php include 'footer.php'; ?>