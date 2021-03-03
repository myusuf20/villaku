<?php
require ('database/dbconfig.php');

// Tambah Data Pendaftaran Villa
if (isset($_POST['daftarkanVilla'])) {

    // Apakah data berhasil ditambahkan atau tidak
    if (tambahDaftarVilla($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Didaftarkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Didaftarkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }

}

// Hapus Data Pemesanan Villa
if (isset($_POST['hapusPemesanan'])) {

    // Apakah data berhasil dihapus atau tidak
    if (hapusPemesananVilla($_POST) > 0) {
        header('Location: index.php');
    } else {
        echo "
            <script>
                alert('Data Pemesanan Gagal Dihapus');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

// Tambah Data Pembayaran Villa
if (isset($_POST['pembayaranVilla'])) {

    // Apakah data berhasil ditambahkan atau tidak
    if (tambahPembayaranVilla($_POST) > 0) {
        echo "
            <script>
                alert('Pembayaran Telah Tersimpan, Mohon Menunggu Konfirmasi Dari Kami');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        // Bila gagal lakukan penghapusan data pemesanan
        if (hapusPemesananVilla($_POST) > 0) {
        header('Location: index.php');
        }
    }
}

?>