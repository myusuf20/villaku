<?php 
require('security.php');

// Hapus Data Pendaftaran
$idPendaftaran = $_GET["id"];

if (hapusPendaftaran($idPendaftaran) > 0) {

    echo "
        <script>
            alert('Data Pendaftaran Berhasil Dihapus!');
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Pendaftaran Gagal Dihapus!');
        </script>
    ";
}
?>