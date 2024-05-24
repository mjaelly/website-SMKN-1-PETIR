<?php 
session_start();
//jika tidak bisa login maka balik ke login.php
//jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
} 

// memanggil atau membutuhkan file function.php
require 'function2.php';

// mengambil data dari nim dengan fungsi get
$nim = $_GET['nim'];

// mengambil datavdari table Mahasiswa dari nim
$siswa = query("SELECT * FROM siswa WHERE nisn = $nim")[0];

// jika fungsi ubah ljika data terubah, maka munculkan alert dibawah
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data siswa berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
    } else {
        // jika fungsi ubah jika data tidak terubah, maka munculkan alert dibawah
        echo "<script>
               alert('Data siswa gagal diubah');
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

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- font google -->
    <link rel="proconnect" href="https://font.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Tambah Data</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php">DATA SISWA SMKN 1 PETIR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <!-- bisa disematkan portfolio pembuat website -->
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
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data Siswa</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="number" class="form-control w-50" id="nisn" value="<?= $siswa['nisn']; ?>" name="nisn" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control w-50" id="nama" value="<?= $siswa['nama']; ?>" name="nama" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control w-50" id="kelas" value="<?= $siswa['kelas']; ?>" name="kelas" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-select w-50">
                            <?php
                            $sql = "SELECT * FROM jurusan"; //change 'your_table' to the name of your table
                            $result = mysqli_query($koneksi, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['nama_jurusan'] . "'>" . $row['nama_jurusan'] .
                                    "</option>";
                                }
                            } else {
                                echo "Error: " . mysqli_error($koneksi);
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control w-50" id="alamat" value="<?= $siswa['alamat']; ?>"name="alamat" automplete="off" required>
                    </div>
                     <hr>
                    <a href="index.php" style="margin-right:10px; width: 100px;" class="btn btn-secondary">Kembali</a>
                    <button type="submit" style="width: 100px;" class="btn btn-warning" name="ubah">Ubah</button>
                </form>
        </div>
    </div>
    </div>
    <!-- close container -->

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
</body>

</html>