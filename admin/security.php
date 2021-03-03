<?php
session_start();

require('../database/dbconfig.php');

if($dbconfig) {
    // echo "Koneksi Terhubung!";
} else {
    header("Location: ../database/dbconfig.php");
}

if (!$_SESSION['username']) {
    header('Location: login.php');
}


?>