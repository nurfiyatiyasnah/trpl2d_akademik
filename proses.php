<?php
require 'koneksi.php';

/* ================================
   INSERT DATA
================================ */
if (isset($_POST['submit'])) {

    $nim       = $_POST['nim'];
    $nama_mhs  = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];

    $query = "INSERT INTO mahasiswa(nim, nama_mhs, tgl_lahir, alamat)
              VALUES ('$nim', '$nama_mhs', '$tgl_lahir', '$alamat')";

    $sql = $koneksi->query($query);

    if ($sql) {
        header("Location: index.php?status=berhasil");
    } else {
        echo "Gagal menyimpan data!";
    }
}



/* ================================
   UPDATE DATA
================================ */
if (isset($_POST['update'])) {

    $nim       = $_POST['nim'];
    $nama_mhs  = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];

    $query = "UPDATE mahasiswa SET 
                nama_mhs='$nama_mhs',
                tgl_lahir='$tgl_lahir',
                alamat='$alamat'
              WHERE nim='$nim'";

    $sql = $koneksi->query($query);

    if ($sql) {
        header("Location: index.php?page=mahasiswa&status=update");
    } else {
        echo "Gagal mengupdate data!";
    }
}



/* ================================
   DELETE DATA
================================ */
if (isset($_GET['delete'])) {

    $nim = $_GET['delete'];

    $query = "DELETE FROM mahasiswa WHERE nim='$nim'";
    $sql   = $koneksi->query($query);

    if ($sql) {
        header("Location: index.php?page=mahasiswa&status=delete");
    } else {
        echo "Gagal menghapus data!";
    }
}

?>
