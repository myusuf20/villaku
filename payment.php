<?php
require('database/dbconfig.php');
date_default_timezone_set('Asia/Jakarta');
?>

<?php
// Ambil data di URL
$id = $_GET["id"];

// Query Data Pemesanan Berdasarkan Villa ID pada Tabel Pemesanan
$pemesanan = query("SELECT * FROM tbl_pemesanan
                    JOIN tbl_villa
                    ON tbl_pemesanan.villa_id = tbl_villa.id
                    WHERE villa_id = $id")[0];

// Query Data Villa berdasarkan ID pada tabel Villa
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

    <title>Payment</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-logo border-bottom">
            <a href="index.html"><img src="asset/elements/logo1.png" alt="logo-daftarkan" height="40px"></a>
        </div>
    </header>
    <!-- Akhir Header -->
    <!-- Container -->
    <div class="container">
        <!-- Main -->
        <section class="form-input">
            <div class="row mt-4">
                <div class="col text-center">
                    <h1>Payment</h1>
                </div>
            </div>
            <form action="functions.php?id=<?= $pemesanan['villa_id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="row justify-content-center mt-5">
                    <div class="col-5 border-right text-dark py-5">
                        <h5>Transfer Pembayaran : <br> <br>
                            Tax : 15% <br>
                            Sub Total : <?= $villa['harga']; ?>$ <br>
                            Total : <span><?= ($pemesanan['total_harga'] * 0.15) + $pemesanan['total_harga']; ?>$</span> <br>
                        </h5>
                        <div class="mt-4">
                            <img src="asset/elements/bca.png" alt="logo-bca" width="100px" class="float-left mr-5">
                            <dl>
                                <dd>Bank Central Asia</dd>
                                <dd>52312412</dd>
                                <dd>Mohammad Yusuf</dd>
                            </dl>
                        </div>
                        <div class="mt-4">
                            <img src="asset/elements/mandiri.png" alt="logo-bca" width="123px" height="80px" class="float-left mr-4">
                            <dl>
                                <dd>Bank Mandiri</dd>
                                <dd>67723727</dd>
                                <dd>Mohammad Yusuf</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="col-5 py-4">
                        <div class="input-text pl-5">
                            <input type="hidden" name="pemesanan_id" value="<?= $pemesanan['id']; ?>">
                            <label for="bukti-transfer">Upload Bukti Transfer</label>
                                <div class="input-group mb-2">
                                    <input type="file" name="upload_bukti" class="form-control">
                                </div>
                            <label for="asal-bank">Asal Bank</label>
                                <div class="input-group mb-2">
                                    <input type="text" name="asal_bank" class="form-control" placeholder="Plaase type here..">
                                </div>
                            <label for="ho-pemesan">Nomor HP</label>
                                <div class="input-group mb-2">
                                    <input type="text" name="no_pengirim" class="form-control" placeholder="Plaase type here..">
                                </div>
                            <label for="nama-pengirim">Nama Pengirim</label>
                                <div class="input-group">
                                    <input type="text" name="nama_pengirim" class="form-control" placeholder="Plaase type here..">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-4 mb-4">
                    <div class="col-5 text-right mr-5">
                        <button type="submit" name="hapusPemesanan" class="btn tombol">Cencel</button>
                    </div>
                    <div class="col-5 text-left">
                        <button type="submit" name="pembayaranVilla" class="btn tombol">Checkout</button>
                    </div>
                </div>
            </form>
        </section>
        <!-- Akhir Main -->
    </div>
    <!-- Akhir Container -->
</body>
</html>