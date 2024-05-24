<?php

//memanggil atau membutuhkan file function.php
require 'function.php';

//menampilkan semua data dari table mahasiswa berdasarkan nim secara Descanding
$siswa = query("SELECT * FROM guru ORDER BY nuptk ASC");
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
       <h2 style="padding: 50px;">Data Guru SMKN 1 PETIR</h2>
       <table id="data" class="table table-striped table-responsive table-hover  text-center" style="width:100%" border="1" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th>N0.</th>
                            <th>Nama</th>
                            <th>NUPTK</th>
                            <th>Bidang Keahlian</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($siswa as $row) : ?>
                            <tr align="center">
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['nuptk'] ?></td>
                                <td><?= $row['bidang_keahlian'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
        </table>
    </div>
</div>
</body>
</html>