<?php
require('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<?php
// Ambil data di URL
$id = $_GET["id"];

// Query Data Villa Berdasarkan ID
$villa = query("SELECT * FROM tbl_villa WHERE id = $id")[0];
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h4 class="font-weight-bold mt-2">Detail Villa</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6 pl-0 pb-2">
                    <input type="hidden" value="<?= $villa['id']; ?>">
                    <img src="../<?= $villa['foto_utama']; ?>" class="img-cover" alt="" height="280px" width="100%">
                </div>
                <div class="col-6 p-0">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Villa</td>
                            <td>: <?= $villa['villa']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?= $villa['alamat']; ?></td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>: <?= $villa['provinsi']; ?></td>
                        </tr>
                        <tr>
                            <td>Nomor HP</td>
                            <td>: <?= $villa['nomor_hp']; ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>: <?= $villa['harga']; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-3 pl-0 mb-5">
                    <img src="../<?= $villa['foto_indoor']; ?>" class="img-cover" alt="" height="180px" width="100%">
                </div>
                <div class="col-3 pl-0">
                    <img src="../<?= $villa['foto_outdoor']; ?> " class="img-cover" alt="" height="180px" width="100%">
                </div>
                <div class="col-6">
                    <span>Deskripsi</span>
                    <div class="mt-2" style="height: 150px; overflow: auto;">
                        <span><?= $villa['deskripsi']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>