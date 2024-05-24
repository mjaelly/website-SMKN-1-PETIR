<?php

session_start();
//jika tidak bisa login maka kembali ke login.php
//jika masuk melalui url, maka langsung ke halaman login
if (!isset($_SESSION['login'])) {
    header('location: login.php');
    exit();
}

//memanggil / membutuhkn file function
require 'function2.php';

//fungsi tambh, jika data tersimpan maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambahjurusan($_POST)) {
        echo "<script>
                alert('Data Jurusan Berhasil ditambahkan!');
              </script>";
    } else {
        //jika fungsi tambah jika data tidak tersimpan, maka munculkan alert di bawah
        echo "<script>
               alert('Data Jurusan gagal ditambahkan!');
              </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!--Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- font google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Tambah Data</title>
</head>

<body>
     <!-- navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppecase">
        <div class="container">
            <a class="navbar-brand" href="index.php">DATA SEKOLAH SMKN 1 PETIR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-control="navbarNav" aria-expanded="false" aria-label="Toggle-navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">GURU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index2.php">SISWA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jurusan.php">JURUSAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- close navbar -->

    <!-- container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Jurusan</h3>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" class="form-control w-50" id="jurusan" placeholder="Masukkan Jurusan" min="1" name="jurusan" autocomplete="off" required>
                </div>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </form>
        </div>
    </div>
    <!-- close container -->
    
</body>
</html>