<?php include 'header.php'; ?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Supplier
            <small>Data Supplier</small>
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
                        <h3 class="box-title">Supplier</h3>
                        <a href="supplier_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>
                            &nbsp Tambah Supplier Baru</a>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table-datatable">
                                <thead>
                                    <tr>
                                        <th width="1%">NO</th>
                                        <th>NAMA SUPPLIER</th>
                                        <th>ALAMAT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "SELECT * FROM supplier");
                                    while ($d = mysqli_fetch_array($data)) {

                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['nama_supplier']; ?></td>
                                        <td><?php echo $d['alamat']; ?></td>

                                        <td>

                                            <a class="btn btn-warning btn-sm"
                                                href="supplier_edit.php?id=<?php echo $d['id_supplier'] ?>"><i
                                                    class="fa fa-cog"></i></a>
                                            <a class="btn btn-danger btn-sm"
                                                href="supplier_hapus.php?id=<?php echo $d['id_supplier'] ?>"><i
                                                    class="fa fa-trash"></i></a>
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
