<?php
require('security.php');

// Hapus Data Pemesanan
$idPemesanan = $_GET["id"];

if (hapusPemesanan($idPemesanan) > 0) {
    echo "
        <script>
            alert('Data Pemesanan Berhasil Dihapus!');
            document.location.href = 'pemesanan.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Pemesanan Gagal Dihapus!');
            
        </script>
    ";
}

?>