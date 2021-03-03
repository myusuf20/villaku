<?php
require('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<?php
// Ambil data di URL
$idVilla = $_GET["id"];

// Query Data Pembayaran Berdasarkan Villa ID pada Tabel Pemesanan
$order = query("SELECT * FROM tbl_pembayaran 
                JOIN tbl_pemesanan 
                ON tbl_pemesanan.id = tbl_pembayaran.pemesanan_id
                WHERE villa_id = $idVilla")[0];

// Query Data Villa Berdasarkan ID
$villa = query("SELECT * FROM tbl_villa WHERE id = $idVilla")[0];
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <h4 class="font-weight-bold mt-2">Detail Pemesanan</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                <h4 class="font-weight-bold text-dark">Pemesanan</h4>
                <table>
                    <tbody>
                    <tr>
                        <td>Mulai </td>
                        <td>: <?= $order['mulai']; ?></td>
                    </tr>
                    <tr>
                        <td>Selesai </td>
                        <td>: <?= $order['selesai']; ?></td>
                    </tr>
                    <tr>
                        <td>Malam </td>
                        <td>: <?= $order['malam']; ?></td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <div class="col-8">
                <h4 class="font-weight-bold text-dark">Pembayaran</h4>
                <table>
                    <tbody>
                    <tr>
                        <td>Nama </td>
                        <td>: <?= $order['nama_pengirim']; ?></td>
                    </tr>
                    <tr>
                        <td>Asal Bank </td>
                        <td>: <?= $order['asal_bank']; ?></td>
                    </tr>
                    <tr>
                        <td>Nomor HP </td>
                        <td>: <?= $order['no_pengirim']; ?></td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <div class="col-12 mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataModalTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Villa</th>
                                    <th>Foto Villa</th>
                                    <th>Alamat</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $order['id']; ?></td>
                                    <td><?= $villa['villa']; ?></td>
                                    <td><img src="../<?= $villa['foto_utama']; ?>" alt="villa-pemesanan" height="100px"></td>
                                    <td><?= $villa['alamat']; ?></td>
                                    <td><img src="image/bukti/<?= $order['upload_bukti']; ?>" alt="bukti-pembayaran" height="100px"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                <table class="float-right mb-3">
                    <tbody>
                    <tr>
                        <td>Tax</td>
                        <td>: 15%</td>
                    </tr>
                    <tr>
                        <td>Sub Total</td>
                        <td>: <?= $villa['harga']; ?>$</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>: <?= ($order['total_harga'] * 0.15) + $order['total_harga']; ?>$</td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>