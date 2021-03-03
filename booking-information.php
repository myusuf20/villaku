<?php 
require('database/dbconfig.php');
?>

<?php
// Ambil data di URL
$id = $_GET["id"];

// Query Data Villa Berdasarkan ID
$villa = query("SELECT * FROM tbl_villa WHERE id = $id")[0];
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

    <title>Informasi Penyewaan</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-logo border-bottom">
            <a href="index.html"><img src="asset/elements/logo1.png" alt="logo-daftarkan" height="40px"></a>
        </div>
    </header>
    <!-- Akhir Header -->
    <!-- Main -->
    <section class="form-input">
        <div class="row mt-4">
            <div class="col text-center">
                <h1>Informasi Penyewaan</h1>
                <h4>Harap di cek kembali dengan benar!</h4>
            </div>
        </div>
        <?php
            // Tambah Data Pemesanan Villa
            if (isset($_POST['booking'])) {

                // Apakah data berhasil ditambahkan atau tidak
                if (pemesananVilla($_POST) > 0) {

                } else {
                    echo "
                        <script>
                            alert('Data Pemesanan Gagal!');
                        </script>
                    ";
                }

            }
            ?>
            <div class="booking-information">
                <div class="row mt-4 mb-3">
                    <img src="<?= $villa['foto_utama']; ?>" alt="" class="img-cover">
                </div>
                <div class="row justify-content-center ">
                    <div class="col-2 pl-5">
                        <h5 class="text-dark"><span><?= $villa['villa']; ?></span></h5>
                        <p><span><?= $villa['provinsi']; ?></span>, <span>Indonesia</span></p>
                    </div>
                    <div class="col-3 text-right pr-5 mt-n3">
                        <p class="text-secondary"><p>Pembayaran senilai <span><?= $villa['harga'] * 4; ?>$</span> belum termasuk PPN </p>
                    </div>
                </div>
                <?php
                /* Query untuk menghapus data pemesanan ketika di 
                klik button kembali berdasarkan villa id */
                // Ambil data di URL
                $id = $_GET["id"];

                // Query Data Pemesanan Berdasarkan villa id
                $pemesanan = query("SELECT * FROM tbl_pemesanan WHERE villa_id = $id")[0];
                ?>
                <div class="row justify-content-center mt-4 mb-4">
                    <div class="col-5 text-right mr-5">
                        <form action="functions.php?id=<?= $pemesanan['villa_id']; ?>" method="POST">
                            <button type="submit" name="hapusPemesanan" class="btn tombol">Kembali</button>
                        </form>
                    </div>
                    <div class="col-5 text-left">
                        <a href="payment.php?id=<?= $villa['id']; ?>">
                            <button type="submit" class="btn tombol">Lanjutkan</button>
                        </a>
                    </div>
                </div>
            </div>
    </section>
    <!-- Akhir Main -->
</body>
</html>