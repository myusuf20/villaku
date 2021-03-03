<?php
require('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<?php
// Ambil data di URL
$id = $_GET["id"];

// Query Data Pendaftaran Berdasarkan ID
$register = query("SELECT * FROM tbl_pendaftaran WHERE id = $id")[0];
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h4 class="font-weight-bold mt-2">Detail Pendaftaran</h4>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-6 pl-0 pb-2">
                <img src="image/<?= $register['foto_utama']; ?>" class="img-cover" alt="" height="280px" width="100%">
            </div>
            <div class="col-6 p-0">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Villa</td>
                        <td>: <?= $register['villa']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?= $register['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td>: <?= $register['provinsi']; ?></td>
                    </tr>
                    <tr>
                        <td>Nomor HP</td>
                        <td>: <?= $register['nomor_hp']; ?></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>: $<?= $register['harga']; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-3 pl-0 mb-3">
                <img src="image/<?= $register['foto_indoor']; ?>" class="img-cover" alt="" height="180px" width="100%">
            </div>
            <div class="col-3 pl-0">
                <img src="image/<?= $register['foto_outdoor']; ?>" class="img-cover" alt="" height="180px" width="100%">
            </div>
            <div class="col-6">
                <span>Deskripsi</span>
                <div class="mt-2" style="height: 150px; overflow: auto;">
                    <span><?= $register['deskripsi']; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>