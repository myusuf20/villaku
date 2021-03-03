<?php
require('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<?php

// Ambil data di URL
$id = $_GET["id"];

// Query Data Mahasiswa Berdasarkan id
$row = query("SELECT * FROM tbl_villa WHERE id = $id")[0];

?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h4 class="font-weight-bold mt-2">Edit Villa</h4>
        </div>
        <div class="card-body">
            <form action="code.php" method="POST">
                <div class="row">
                    <div class="col-6">
                        <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                        <div class="form-group">
                            <label for="villa" class="col-form-label">Nama Villa</label>
                            <input type="text" class="form-control" name="villa" value="<?= $row["villa"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="harga" class="col-form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" value="<?= $row["harga"] ?>">
                        </div>
                        <div class="form-group">
                            <img src="../<?= $row["foto_utama"]; ?>" class="img-cover pl-2" alt="" height="95px" width="142px">
                            <img src="../<?= $row["foto_indoor"]; ?>" class="img-cover pl-2" alt="" height="95px" width="142px">
                            <img src="../<?= $row["foto_outdoor"]; ?>" class="img-cover pl-2" alt="" height="95px" width="142px">
                            <input type="text" class="form-control mt-2" placeholder="Foto Utama..." name="foto_utama" value="<?= $row["foto_utama"]; ?>">
                            <input type="text" class="form-control mt-2" placeholder="Foto Indoor..." name="foto_indoor" value="<?= $row["foto_indoor"]; ?>">
                            <input type="text" class="form-control mt-2" placeholder="Foto Outdoor..." name="foto_outdoor" value="<?= $row["foto_outdoor"]; ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="alamat" class="col-form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $row["alamat"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="provinsi" class="col-form-label">Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" value="<?= $row["provinsi"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp" class="col-form-label">Nomor HP</label>
                            <input type="text" class="form-control" value="<?= $row["nomor_hp"]; ?>" name="nomor_hp">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="col-form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="4"><?= $row["deskripsi"]; ?></textarea>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>