<?php
//memanggil atau membutuhkan file function.php
require 'function.php';

//jika Data Mahasiswa diklik maka
if (isset($_POST['dataSiswa'])) {
    $output = '';

    //mengambil data Mahasiswa dari nim
    $sql = "SELECT * FROM guru WHERE nuptk = '" . $_POST['dataSiswa'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= ' 
                        <tr>
                            <th width="40%">NUPTK</th>
                            <td width="60%">' . $row['nuptk'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Bidang keahlian</th>
                            <td width="60%">' . $row['bidang_keahlian'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Alamat</th>
                            <td width="60%">' . $row['alamat'] . '</td>
                        </tr>
                        ';                                 
    }  
    $output .= '</table></div>';
    //tampilkan $output
    echo $output;
} 