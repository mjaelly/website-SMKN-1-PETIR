<?php
//memanggil atau membutuhkan file function.php
require 'function.php';

//menampilkan semua data dari table Mahasiswa berdasarkan nim secara Descending
$siswa = query("SELECT * FROM guru ORDER BY nuptk DESC");

//membuat nama file
$filename = "data guru fti-" . date('Ymd') . ".xls";

// export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Date Siswa.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NUPK</th>
            <th>Bidang Keahlian</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($siswa as $row) : ?>
            <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['nupk']; ?></td>
            <td><?= $row['bidang_keahlian']; ?></td>
            <td><?= $row['alamat']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>