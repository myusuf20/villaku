<?php
require('security.php');

// Login
if(isset($_POST['login'])) {
    $username_login = $_POST['username'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM tbl_admin WHERE username='$username_login' AND password='$password_login' ";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run)) {
        $_SESSION['username'] = $username_login;
        header('Location: index.php');
    } else {
        $_SESSION['status'] = 'username atau password salah!';
        header('Location: login.php');
    }
}

// Tambah Data Villa
if (isset($_POST['add_villa'])) {

    // Apakah data berhasil ditambahkan atau tidak
    if (tambahVilla($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }

}

// Simpan Data Villa
if (isset($_POST['simpan'])) {

    // Apakah data berhasil ditambahkan atau tidak
    if (editVilla($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
    
}

// Hapus Data Villa
$idVilla = $_GET["id"];
    
if (hapusVilla($idVilla) > 0) {
    echo "
        <script>
            alert('Data Villa Berhasil Dihapus!');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Villa Gagal Dihapus!');
            document.location.href = 'index.php';
        </script>
    ";
}

?>