<?php
//koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "db_sekolah");

//membuat fungsi query dalam bentuk array
function query($query)
{
    //koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    //membuat variabel array
    $rows = [];

    //mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// guru
 function tambah($data)
{
   global $koneksi;

   $nuptk = htmlspecialchars($data['nuptk']);
   $nama = htmlspecialchars($data['nama']);
   $bidang_keahlian = htmlspecialchars($data['bidang_keahlian']);
   $alamat = htmlspecialchars($data['alamat']);

   //mengecek apakah NUPTK sudah ada di tabel
   $query_cek_nuptk = "SELECT * FROM guru WHERE nuptk = '$nuptk'";
   $result = mysqli_query($koneksi, $query_cek_nuptk);

  //jika NUPTK sudah ada, kembalikan 0
  if (mysqli_num_rows($result) > 0) {
        return 0;
    } else {
        //jika NUPT belum ada, masukkan data ke dalam tabel
        $sql_sekolah = "INSERT INTO guru(nuptk, nama, bidang_keahlian, alamat) VALUES ('$nuptk','$nama','$bidang_keahlian','$alamat')";
        mysqli_query($koneksi, $sql_sekolah);

        //mengembalikan jumlah garis yang terpengaruh oleh operasi query (1 jika berhasil, 0 jika gagal)

        return mysqli_affected_rows($koneksi);
    }
}




//membuat fungsi hapus
function hapus($nuptk)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM guru WHERE nuptk = $nuptk");
    return mysqli_affected_rows($koneksi);

}



//membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nuptk = htmlspecialchars($data['nuptk']);
    $nama = htmlspecialchars($data['nama']);
    $bidang_keahlian = htmlspecialchars($data['bidang_keahlian']);
    $alamat = htmlspecialchars($data['alamat']);

    $sql = "UPDATE guru SET nama = '$nama', bidang_keahlian = '$bidang_keahlian', alamat = '$alamat' WHERE nuptk = $nuptk";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}


?>