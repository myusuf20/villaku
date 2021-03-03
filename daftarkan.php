<?php 
require('database/dbconfig.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- CSS Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Daftarkan</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-logo border-bottom">
            <a href="index.php"><img src="asset/elements/logo1.png" alt="logo-daftarkan" height="40px"></a>
        </div>
    </header>
    <!-- Akhir Header -->
    <!-- Container -->
    <div class="container">
        <!-- Main -->
        <section class="form-input">
            <div class="row mt-4">
                <div class="col text-center">
                    <h1>Daftar Villa</h1>
                    <h4>Masukkan data yang tertera dengan benar!</h4>
                </div>
            </div>
            <form action="functions.php" method="POST" enctype="multipart/form-data">
                <div class="row justify-content-center mt-4">
                    <div class="col-5 border-right py-4">
                        <input type="hidden" name="id">
                        <label for="upload-foto">Upload Foto Villa</label>
                        <div class="input-text mr-5">
                            <div class="input-group mb-2">
                                <input type="file" id="upload-foto" class="form-control" name="foto_utama">
                            </div>
                            <div class="input-group mb-2">
                                <input type="file" id="upload-foto" class="form-control" name="foto_indoor">
                            </div>
                            <div class="input-group mb-2">
                                <input type="file" id="upload-foto" class="form-control" name="foto_outdoor">
                            </div>
                        </div>
                        <label for="provinsi">Provinsi</label>
                        <div class="input-text mr-5 mb-2">
                            <div class="input-group">
                                <input type="text" id="provinsi" class="form-control" placeholder="Plaase type here.." name="provinsi">
                            </div>
                        </div>
                        <label for="harga">Harga Permalam</label>
                        <div class="input-text mr-5">
                            <div class="input-group">
                                <input type="text" id="harga" class="form-control" placeholder="Plaase type here.." name="harga">
                            </div>
                        </div>
                    </div>
                    <div class="col-5 py-4">
                        <div class="input-text pl-5">
                            <label for="villa">Nama Villa</label>
                                <div class="input-group mb-2">
                                    <input type="text" id="villa" class="form-control" placeholder="Plaase type here.." name="villa">
                                </div>
                            <label for="alamat">Alamat Villa</label>
                                <div class="input-group mb-2">
                                    <input type="text" id="alamat" class="form-control" placeholder="Plaase type here.." name="alamat">
                                </div>
                            <label for="nomor_hp">Nomor HP</label>
                                <div class="input-group mb-2">
                                    <input type="text" id="nomor_hp" class="form-control" placeholder="Plaase type here.." name="nomor_hp">
                                </div>
                            <label for="deskripsi">Deskripsi Villa</label>
                                <div class="input-group">
                                    <textarea id="deskripsi" class="form-control" rows="2" name="deskripsi"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4 mb-4">
                    <div class="col-5 text-right mr-5">
                        <a href="index.php">
                            <button type="button" class="btn tombol">Cencel</button>
                        </a>
                    </div>
                    <div class="col-5 text-left">
                        <button type="submit" class="btn tombol" name="daftarkanVilla">Daftar</button>
                    </div>
                </div>
            </form>
        </section>
        <!-- Akhir Main -->
    </div>
    <!-- Akhir Container -->
</body>
</html>