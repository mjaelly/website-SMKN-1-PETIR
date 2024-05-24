<?php
session_start();
//jika tidak bisa login maka balik ke login.php
//jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}
//memanggil atau membutuhkan file function.php
require 'function2.php';

//mengambil data dari nis dengan fungsi get
$nim = $_GET['id_jurusan'];

//jika fungsi hapus jika data terhapus,maka munculkan alert dibawah
if (hapusjurusan($nim) > 0) {
    echo "<script>
                alert('Data Jurusan berhasil dihapus!');
                document.location.href = 'jurusan.php';
        </script>";
} else {
    //jika fungsi hapus jika data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Data Jurusan gagal dihapus!');
        </script>";
}