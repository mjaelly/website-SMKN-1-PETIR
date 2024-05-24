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

//siswa
function tambah($data)
{
   global $koneksi;

   $nisn = htmlspecialchars($data['nisn']);
   $nama = htmlspecialchars($data['nama']);
   $kelas = htmlspecialchars($data['kelas']);
   $jurusan = htmlspecialchars($data['jurusan']);
   $alamat = htmlspecialchars($data['alamat']);

   //mengecek apakah NISN sudah ada di tabel
   $query_cek_nisn ="SELECT * FROM siswa WHERE nisn = '$nisn'";
   $result = mysqli_query($koneksi, $query_cek_nisn);

  //jika NUPTK sudah ada, kembalikan 0
  if (mysqli_num_rows($result) > 0) {
        return 0;
    } else {
        //jika NISN belum ada, masukkan data ke dalam tabel
        $sql_sekolah = "INSERT INTO siswa(nisn, nama, kelas, jurusan, alamat) VALUES ('$nisn','$nama','$kelas','$jurusan','$alamat')";
        mysqli_query($koneksi, $sql_sekolah);

        //mengembalikan jumlah garis yang terpengaruh oleh operasi query (1 jika berhasil, 0 jika gagal)

        return mysqli_affected_rows($koneksi);
    }
}

function tambahjurusan($data)
{
    global $koneksi;
    $jurusan = htmlspecialchars($data['jurusan']);

    $sql_jurusan = "INSERT INTO jurusan (nama_jurusan) VALUES ('" .$jurusan . "')" ;
    mysqli_query($koneksi, $sql_jurusan); 
    return mysqli_affected_rows($koneksi);
}

//membuat fungsi hapus
function hapus($nisn)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn = $nisn");
    return mysqli_affected_rows($koneksi);

}

function hapusjurusan($nim)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM jurusan WHERE id_jurusan = $nim");
    return mysqli_affected_rows($koneksi);
}

//membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nisn = htmlspecialchars($data['nisn']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $alamat = htmlspecialchars($data['alamat']);

    $sql = "UPDATE siswa SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', alamat = '$alamat' WHERE nisn = $nisn";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}
?>