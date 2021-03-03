<?php
require('database/dbconfig.php');
include('includes/header-properties.php');
?>

<?php
// Ambil data di URL
$id = $_GET["id"];

// Query Data Villa Berdasarkan ID
$villa = query("SELECT * FROM tbl_villa WHERE id = $id")[0];
?>

<!-- Container -->
<div class="container">
    <!-- Hedaer -->
    <header class="header">
        <h2 class="text-center"><?= $villa['villa']; ?></h2>
        <h4 class="text-center text-secondary mt-n3">
            <span><?= $villa['provinsi']; ?>,</span>
            <span>Indonesia</span>
        </h4>
        <div class="row">
            <div class="col-7 p-3">
                <img class="img-cover-main" src="<?= $villa['foto_utama']; ?>" width="628px" height="450px">
            </div>
            <div class="col-5 p-3">
                <div class="border p-2">
                    <h5 class = "shadow-sm p-3 mb-2 bg-white rounded text-center">Tentang Villa</h5>
                    <div class="overflow-auto mb-3">
                        <p class="text-justify pr-2"><?= $villa['deskripsi']; ?></p>
                    </div>
                        <h5>Lokasi</h5>
                    <p>
                        <span><?= $villa['alamat']; ?>,</span>
                        <span><?= $villa['provinsi']; ?>, Indonesia</span>
                    </p>
                    <a href="#">
                        <button type="button" class="btn btn-block">Cek Lokasi</button>
                    </a>
                </div>
            </div>
            <div class="col-3 mb-5">
                <img class="img-cover" src="<?= $villa['foto_indoor']; ?>" width="260px" height="415px">
            </div>
            <div class="col-4 mb-5">
                <img class="img-cover" src="<?= $villa['foto_outdoor']; ?>" width="352px" height="415px">
            </div>
            <div class="col-5 mb-5">
                <div class="booking border p-2">
                    <h5 class="shadow-sm p-3 mb-2 bg-white rounded text-center">Mulai Booking</h5>
                    <div class="input-number">
                        <div class="input-label">
                            <h3>
                                <span><?= $villa['harga']; ?>$</span>
                                <span class="text-muted">per malam</span>
                            </h3>
                        </div>
                        <form action="booking-information.php?id=<?= $villa['id']; ?>" method="POST">
                            <div class="date-title">
                                <h5 class="mt-2">Berapa lama?</h5>
                                <input type="hidden" value="<?= $villa['id']; ?>" name="villa_id">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" data-id="villa" class="input-group-text minus">-</button>
                                    </div>
                                    <input readonly data-id="villa" class="qty_input form-control rounded-0 text-center" value="1" name="malam">
                                    <div class="input-group-append">
                                        <button type="button" data-id="villa" class="input-group-text plus">+</button>
                                    </div>
                                </div>
                                <h5 class="mt-3">Pilih tanggal</h5>
                                <div class="input-group">
                                    <div class="calendar input-group-prepend">
                                        <span>
                                            <img src="asset/elements/iconvilla-06.png" alt="icon calendar" class="icon-calendar" height="40px">
                                        </span>
                                        <input type="text" class="form-control datedropper-start text-center pl-0" data-dd-format="Y-m-d"  placeholder="Mulai" data-datedropper name="mulai">
                                        <span>
                                            <img src="asset/elements/iconvilla-06.png" alt="icon calendar" class="icon-calendar" height="40px">
                                        </span>
                                        <input type="text" class="form-control datedropper-end text-center pl-0" data-dd-format="Y-m-d" placeholder="Selesai" data-datedropper name="selesai">
                                    </div>
                                </div>
                                <p>Anda akan membayar total senilai <span class="total-price"><?= $villa['harga'] * 4; ?>$</span></p>
                                <input type="hidden" value="<?= $villa['harga'] * 4; ?>" name="total_harga">
                                <button type="submit" class="btn btn-block" name="booking">Booking!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Akhir Header -->

    <!-- Maps -->
    <div class="maps">
        <h3 class="text-center pb-3">Lokasi</h3>
        <div class="row border p-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5294308320767!2d106.84701811468015!3d-6.1936539624039275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4429d8065c5%3A0x29fad4f6e9e0da2e!2sJl.%20Salemba%20Raya%2C%20RT.1%2FRW.3%2C%20Paseban%2C%20Kec.%20Senen%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1602766484430!5m2!1sid!2sid" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <div class="info-maps">
        <div class="row ml-5">
            <div class="col-1 ml-5 mr-1">
                <img src="asset/elements/iconvilla-03.png" alt="logo-maps" width="90px">
            </div>
            <div class="col-4 mt-1">
                <h6><?= $villa['alamat']; ?></h6>
                <h6><span><?= $villa['provinsi']; ?>, Indonesia</span></h6>
            </div>
            <div class="col-1 mt-n1 ml-5">
                <img src="asset/elements/iconvilla-05.png" alt="logo-maps" width="90px">
            </div>
            <div class="col-3">
                <h6>support@villa.com</h6>
                <h6>021-2222-3333</h6>
                <h6>Villaku, Salemba, Jakarta</h6>
            </div>
        </div>
    </div>
    <!-- Akhir Maps -->
</div>
<!-- Akhir Container -->

<?php 
include('includes/footer-properties.php');
include('includes/script-properties.php');
?>