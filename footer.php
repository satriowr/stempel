<!-- FOOTER -->
<footer id="footer" class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <!-- footer logo -->
                    <div class="footer-logo">
                          <a class="logo" style="font-weight:bold; font-size:28px;" href="index.php">
                            TOKO STEMPEL KEDIRI
                        </a>
                    </div>
                    <!-- /footer logo -->



                </div>
            </div>
            <!-- /footer widget -->

            <div class="clearfix visible-sm visible-xs"></div>

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">Customer Service</h3>
                    <ul class="list-links">
                        <li><a href="tentang_kami.php">Tentang</a></li>
                        <li><a href="faq.php">Bantuan</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer subscribe -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">Lokasi Toko</h3>
                    <p>Jln Penanggungan 45H, Bandar Lor, Kec. Mojoroto, SUNSET CAFE kediri Jawa Timur 64117 Indonesia
Bandar Lor, Mojoroto, Kota Kediri
Kode Pos 64117</p>

                    <!-- footer social -->
                    <!--<ul class="footer-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul> -->
                    <!-- /footer social -->
                </div>
            </div>
            <!-- /footer subscribe -->
        </div>
        <!-- /row -->
        <hr>
        <!-- row -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">

            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="frontend/js/jquery.min.js"></script>
<!-- <script src="assets/bower_components/jquery/dist/jquery.min.js"></script> -->
<script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="frontend/js/bootstrap.min.js"></script>
<script src="frontend/js/slick.min.js"></script>
<script src="frontend/js/nouislider.min.js"></script>
<script src="frontend/js/jquery.zoom.min.js"></script>
<script src="frontend/js/main.js"></script>

</body>

<script>
$(document).ready(function() {

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $('.jumlah').on("keyup", function() {
        var nomor = $(this).attr('nomor');

        var jumlah = $(this).val();

        var harga = $("#harga_" + nomor).val();

        var total = jumlah * harga;

        var t = numberWithCommas(total);

        $("#total_" + nomor).text("Rp. " + t + " ,-");
    });
});








$(document).ready(function() {
    $('#provinsi').change(function() {
        var prov = $('#provinsi').val();


        var provinsi = $("#provinsi :selected").text();

        $.ajax({
            type: 'GET',
            url: 'rajaongkir/cek_kabupaten.php',
            data: 'prov_id=' + prov,
            success: function(data) {
                $("#kabupaten").html(data);
                $("#provinsi2").val(prov);
            }
        });
    });

    $('#provinsit').change(function() {
        var prov = $('#provinsit').val();


        var provinsi = $("#provinsit :selected").text();

        $.ajax({
            type: 'GET',
            url: 'rajaongkir/cek_kabupaten.php',
            data: 'prov_id=' + provinsi,
            success: function(data) {
                $("#kabupatent").html(data);
                $("#provinsi2").val(prov);
            }
        });
    });

    $(document).ready(function() {

        var asal = 152;
        var kab = $(this).val('');
        var kurir = "a";
        var berat = $('#berat2').val();

        var kabupaten = $('#kabupaten').val();

        $.ajax({
            type: 'POST',
            url: 'rajaongkir/cek_ongkir.php',
            data: {
                'kab_id': kabupaten,
                'kurir': kurir,
                'asal': asal,
                'berat': berat
            },
            success: function(data) {
                $("#ongkir").html(data);
                // alert(data);

                // $("#provinsi").val(prov);
                // $("#kabupaten2").val(kabupaten);

            }
        });
    });

    function format_angka(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $(document).on("change", '.pilih-kurir', function(event) {
        // alert("new link clicked!");
        var kurir = $(this).attr("kurir");
        var service = $(this).attr("service");
        var ongkir = $(this).attr("harga");
        var total_bayar = $("#total_bayar").val();

        $("#kurir").val(kurir);
        $("#service").val(service);
        $("#ongkir2").val(ongkir);
        var total = parseInt(total_bayar) + parseInt(ongkir);
        $("#tampil_ongkir").text("Rp. " + format_angka(ongkir) + " ,-");
        $("#tampil_total").text("Rp. " + format_angka(total) + " ,-");
    });


    // $(".pilih-kurir").on("change",function(){

    // 	alert('sd');
    // var asal = 152;
    // var kab = $('#kabupaten').val();
    // var kurir = "a";
    // var berat = $('#berat2').val();

    // $.ajax({
    // 	type : 'POST',
    // 	url : 'rajaongkir/cek_ongkir.php',
    // 	data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
    // 	success: function (data) {
    // 		$("#ongkir").html(data);
    // 		// alert(data);

    // 	}
    // });
    // });



});

$(document).ready(function() {

    // $(".edit").hide();

    $('#table-datatable').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': false,
        'info': true,
        'autoWidth': true,
        "pageLength": 50
    });
});
</script>

</html>
