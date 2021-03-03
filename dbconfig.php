<?php
// Membuat Koneksi
$servername = "localhost";
$database = "villaku";
$username = "root";
$password = "";

$connection = mysqli_connect($servername, $username, $password, $database);
$dbconfig = mysqli_select_db($connection, $database);

if ($dbconfig) {
    // echo "Koneksi Terhubung!";
} else {
    echo "Koneksi Gagal!";
}

function query($query) {
    
    global $connection;
    $result = mysqli_query($connection, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi menambahkan data villa pada database
function tambahVilla($data) {
    global $connection;

    $villa = htmlspecialchars($data['villa']);
    $foto_utama = htmlspecialchars($data['foto_utama']);
    $foto_indoor = htmlspecialchars($data['foto_indoor']);
    $foto_outdoor = htmlspecialchars($data['foto_outdoor']);
    $alamat = htmlspecialchars($data['alamat']);
    $provinsi = htmlspecialchars($data['provinsi']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $nomor_hp = htmlspecialchars($data['nomor_hp']);
    $harga = htmlspecialchars($data['harga']);

    $query = "INSERT INTO tbl_villa VALUES (
              '', 
              '$villa', 
              '$foto_utama', 
              '$foto_indoor', 
              '$foto_outdoor', 
              '$alamat', 
              '$provinsi', 
              '$deskripsi', 
              '$nomor_hp', 
              '$harga')";

    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection);
}

// Fungsi menghapus data villa pada database
function hapusVilla($idVilla) {
    global $connection;

    $query = "DELETE FROM tbl_villa WHERE id = $idVilla";

    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

// Fungsi mengubah data villa pada database
function editVilla($data) {
    global $connection;

    $id = $data['id'];
    $villa = htmlspecialchars($data['villa']);
    $foto_utama = htmlspecialchars($data['foto_utama']);
    $foto_indoor = htmlspecialchars($data['foto_indoor']);
    $foto_outdoor = htmlspecialchars($data['foto_outdoor']);
    $alamat = htmlspecialchars($data['alamat']);
    $provinsi = htmlspecialchars($data['provinsi']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $nomor_hp = htmlspecialchars($data['nomor_hp']);
    $harga = htmlspecialchars($data['harga']);

    $query = "UPDATE tbl_villa SET
               villa = '$villa',
               foto_utama = '$foto_utama',
               foto_indoor = '$foto_indoor',
               foto_outdoor = '$foto_outdoor',
               alamat = '$alamat',
               provinsi = '$provinsi',
               deskripsi = '$deskripsi',
               nomor_hp = '$nomor_hp',
               harga = '$harga'
               WHERE id = $id
               ";

    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection); 
}

// Fungsi menghapus data pendaftaran pada database
function hapusPendaftaran($idPendaftaran) {
    global $connection;

    $query = "DELETE FROM tbl_pendaftaran WHERE id = $idPendaftaran";

    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

// Fungsi menambahkan data pendaftaran villa pada database
function tambahDaftarVilla($data) {
    global $connection;

    $villa = htmlspecialchars($data['villa']);
    $alamat = htmlspecialchars($data['alamat']);
    $provinsi = htmlspecialchars($data['provinsi']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $nomor_hp = htmlspecialchars($data['nomor_hp']);
    $harga = htmlspecialchars($data['harga']);

    // Upload Foto Utama
    $foto_utama = uploadFotoUtama();
    if (!$foto_utama) {
        return false;
    }

    // Upload Foto Indoor
    $foto_indoor = uploadFotoIndoor();
    if (!$foto_indoor) {
        return false;
    }
    
    // Upload Foto Outdoor
    $foto_outdoor = uploadFotoOutdoor();
    if (!$foto_outdoor) {
        return false;
    }

    $query = "INSERT INTO tbl_pendaftaran 
              VALUES (
              '',
              '$foto_utama', 
              '$foto_indoor',
              '$foto_outdoor',
              '$villa', 
              '$alamat', 
              '$provinsi', 
              '$deskripsi', 
              '$nomor_hp', 
              '$harga')";

    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection);
}

// Fungsi Pengecekan Upload Foto Villa Ketika Mendaftar
function uploadFotoUtama() {
    $namaFoto = $_FILES['foto_utama']['name'];
    $ukuranFoto = $_FILES['foto_utama']['size'];
    $error = $_FILES['foto_utama']['error'];
    $tmpName = $_FILES['foto_utama']['tmp_name'];

    // Cek apakah tidak ada Foto Utama yang diupload
    if($error === 4) {
        echo "<script>
               alert('Pilih Foto Terlebih Dahulu!');
              </script>";
        return false;
    }

    // Cek apakah yang diupload adalah foto JPG
    $ekstensiFotoValid = ['jpg'];
    $ekstensiFoto = explode('.', $namaFoto); 
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "<script>
                alert('File Bukan Berupa Foto atau Gambar!');
              </script>";
        return false;
    }

    // Cek ukuran fotonya terlalu besar
    if ($ukuranFoto > 2000000) {
        echo "<script>
                alert('Ukuran Foto Terlalu Besar!');
              </script>";
        return false;
    }

    // Foto siap diupload
    /* Generate Nama Foto Baru Untuk 
    Tidak Menerima Nama Foto Yang Sama */
    $namaFotoBaru = uniqid();
    $namaFotoBaru .= '.';
    $namaFotoBaru .= $ekstensiFoto;

    move_uploaded_file($tmpName, 'admin/image/' . $namaFotoBaru);

    return $namaFotoBaru;

}

function uploadFotoIndoor() {
    $namaFoto = $_FILES['foto_indoor']['name'];
    $ukuranFoto = $_FILES['foto_indoor']['size'];
    $error = $_FILES['foto_indoor']['error'];
    $tmpName = $_FILES['foto_indoor']['tmp_name'];

    // Cek apakah tidak ada FotoIndoor yang diupload
    if($error === 4) {
        echo "<script>
               alert('Pilih Foto Terlebih Dahulu!');
              </script>";
        return false;
    }

    // Cek apakah yang diupload adalah gambar JPG
    $ekstensiFotoValid = ['jpg'];
    $ekstensiFoto = explode('.', $namaFoto); 
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "<script>
                alert('File Bukan Berupa Foto atau Gambar!');
                </script>";
        return false;
    }

    
    // Cek ukuran fotonya terlalu besar
    if ($ukuranFoto > 2000000) {
        echo "<script>
                alert('Ukuran Foto Terlalu Besar!');
              </script>";
        return false;
    }

    // Foto siap diupload
    /* Generate Nama Foto Baru Untuk 
    Tidak Menerima Nama Foto Yang Sama */
    $namaFotoBaru = uniqid();
    $namaFotoBaru .= '.';
    $namaFotoBaru .= $ekstensiFoto;

    move_uploaded_file($tmpName, 'admin/image/' . $namaFotoBaru);

    return $namaFotoBaru;
}

function uploadFotoOutdoor() {
    $namaFoto = $_FILES['foto_outdoor']['name'];
    $ukuranFoto = $_FILES['foto_outdoor']['size'];
    $error = $_FILES['foto_outdoor']['error'];
    $tmpName = $_FILES['foto_outdoor']['tmp_name'];

    // Cek apakah tidak ada Foto Outdoor yang diupload
    if($error === 4) {
        echo "<script>
               alert('Pilih Foto Terlebih Dahulu!');
              </script>";
        return false;
    }

    // Cek apakah yang diupload adalah gambar JPG
    $ekstensiFotoValid = ['jpg'];
    $ekstensiFoto = explode('.', $namaFoto); 
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "<script>
                alert('File Bukan Berupa Foto atau Gambar!');
                </script>";
        return false;
    }

    
    // Cek ukuran fotonya terlalu besar
    if ($ukuranFoto > 2000000) {
        echo "<script>
                alert('Ukuran Foto Terlalu Besar!');
              </script>";
        return false;
    }

    // Foto siap diupload
    /* Generate Nama Foto Baru Untuk 
    Tidak Menerima Nama Foto Yang Sama */
    $namaFotoBaru = uniqid();
    $namaFotoBaru .= '.';
    $namaFotoBaru .= $ekstensiFoto;

    move_uploaded_file($tmpName, 'admin/image/' . $namaFotoBaru);

    return $namaFotoBaru;
}

// Fungsi menambahkan data pemesanan villa
function pemesananVilla($data) {
    global $connection;

    $villa_id = $data['villa_id'];
    $mulai = $data['mulai'];
    $selesai = $data['selesai'];
    $malam = $data['malam'];
    $total_harga = $data['total_harga'];

    $query = "INSERT INTO tbl_pemesanan VALUES (
              '',
              '$villa_id',
              '$mulai',
              '$selesai',
              '$malam',
              '$total_harga')";
    
    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection);
}

// Fungsi Hapus Seluruh Data Pemesanan & Pendaftaran
function hapusPemesanan($idPemesanan) {
global $connection;

    $idPemesanan = $_GET["id"];

    $query = "DELETE tbl_pembayaran, tbl_pemesanan 
              FROM tbl_pembayaran JOIN tbl_pemesanan
              ON tbl_pemesanan.id = tbl_pembayaran.pemesanan_id
              WHERE pemesanan_id = $idPemesanan";

    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

// Fungsi hapus data pemesanan berdasarkan ID Villa
function hapusPemesananVilla($idVilla) {
    global $connection;

    $idVilla = $_GET["id"];

    $query = "DELETE FROM tbl_pemesanan WHERE villa_id = $idVilla";

    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

// Fungsi menambahkan data pembayaran villa pada database
function tambahPembayaranVilla($data) {
    global $connection;

    // Ambil data di URL
    $id = $_GET["id"];

    // Query Data Pemesanan Berdasarkan ID
    $query = "SELECT * FROM tbl_pemesanan WHERE villa_id = $id";

    $pemesanan_id = htmlspecialchars($data['pemesanan_id']);
    $nama_pengirim = htmlspecialchars($data['nama_pengirim']);
    $asal_bank = htmlspecialchars($data['asal_bank']);
    $no_pengirim = htmlspecialchars($data['no_pengirim']);
    $created_at = date("Y-m-d H:i:s");

    // Cek Upload Bukti Transfer
    $upload_bukti = uploadBuktiTransfer();
    if (!$upload_bukti) {
        return false;
    }

    $query = "INSERT INTO tbl_pembayaran 
              VALUES (
              '',
              '$pemesanan_id',
              '$upload_bukti', 
              '$nama_pengirim',
              '$asal_bank',
              '$no_pengirim',
              '$created_at')";

    mysqli_query($connection, $query);

    return mysqli_affected_rows($connection);
}

//Fungsi pengecekan Upload Foto Bukti
function uploadBuktiTransfer() {
    $namaFoto = $_FILES['upload_bukti']['name'];
    $ukuranFoto = $_FILES['upload_bukti']['size'];
    $error = $_FILES['upload_bukti']['error'];
    $tmpName = $_FILES['upload_bukti']['tmp_name'];

    // Cek apakah tidak ada Bukti Pembayaran yang diupload
    if($error === 4) {
        echo "<script>
               alert('Upload Bukti Terlebih Dahulu!');
              </script>";
        return false;
    }

    // Cek apakah yang diupload adalah foto JPG
    $ekstensiFotoValid = ['jpg','jpeg'];
    $ekstensiFoto = explode('.', $namaFoto); 
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "<script>
                alert('File Bukan Berupa Foto!');
              </script>";
        return false;
    }

    // Cek ukuran fotonya terlalu besar
    if ($ukuranFoto > 1000000) {
        echo "<script>
                alert('Ukuran Foto Terlalu Besar!');
              </script>";
        return false;
    }

    // Foto siap diupload
    /* Generate Nama Foto Baru Untuk 
    Tidak Menerima Nama Foto Yang Sama */
    $namaFotoBaru = uniqid();
    $namaFotoBaru .= '.';
    $namaFotoBaru .= $ekstensiFoto;

    move_uploaded_file($tmpName, 'admin/image/bukti/' . $namaFotoBaru);

    return $namaFotoBaru;

}
?>