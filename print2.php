<?php

//memanggil atau membutuhkan file function.php
require 'function2.php';

//menampilkan semua data dari table mahasiswa berdasarkan nim secara Descanding
$siswa = query("SELECT * FROM sekolah ORDER BY nim ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
</head>
<body onload="window.print()">
<div class="row my-3">
    <div class="col-md">
       <h2 style="padding: 50px;">Data Siswa SMKN 1 PETIR</h2>
       <table id="data" class="table table-striped table-responsive table-hover  text-center" style="width:100%" border="1" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th>N0.</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($siswa as $row) : ?>
                            <tr align="center">
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['nisn'] ?></td>
                                <td><?= $row['kelas'] ?></td>
                                <td><?= $row['jurusan'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
        </table>
    </div>
</div>
</body>
</html>