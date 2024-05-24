<?php
session_start();
// //jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}
//memanggil atau membutuhkan file function.php
require 'function.php';

//mengambil data dari nis dengan fungsi get
$nuptk = $_GET['nuptk'];

//jika fungsi hapus jika data terhapus, maka munculkan alert dibawah
if (hapus($nuptk) > 0) {
echo "<script>
       alert('Data Guru berhasil dihapus!');
       document.location.href = 'index.php';
    </script>";
} else {
    //jika fungsi hapus jika data tidak terhapus,maka munculkan alert dibawah
    echo "<script>
           alert('Data Guru gagal dihapus!');
        </script>";
}
