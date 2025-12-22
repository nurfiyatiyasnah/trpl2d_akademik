<?php
require 'koneksi.php';

/* ================================
   INSERT DATA MAHASISWA
================================ */
if (isset($_POST['submit'])) {

    $nim       = $_POST['nim'];          // VARCHAR
    $nama_mhs  = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];
    $prodi_id  = (int) $_POST['prodi_id'];

    $sql  = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat, prodi_id)
             VALUES (?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('ssssi', $nim, $nama_mhs, $tgl_lahir, $alamat, $prodi_id);

    if ($stmt->execute()) {
        header("Location: index.php?page=mahasiswa&status=berhasil");
        exit();
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }
    $stmt->close();
}

/* ================================
   UPDATE DATA MAHASISWA
================================ */
if (isset($_POST['update'])) {

    $nim       = $_POST['nim'];          // primary key
    $nama_mhs  = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];
    $prodi_id  = (int) $_POST['prodi_id'];

    $sql  = "UPDATE mahasiswa
             SET nama_mhs = ?, tgl_lahir = ?, alamat = ?, prodi_id = ?
             WHERE nim = ?";
    $stmt = $koneksi->prepare($sql);
    // 3 string, 1 integer, 1 string
    $stmt->bind_param('sssis', $nama_mhs, $tgl_lahir, $alamat, $prodi_id, $nim);

    if ($stmt->execute()) {
        header("Location: index.php?page=mahasiswa&status=update");
        exit();
    } else {
        echo "Gagal mengupdate data: " . $stmt->error;
    }
    $stmt->close();
}

/* ================================
   DELETE DATA MAHASISWA
================================ */
if (isset($_GET['delete'])) {

    $nim = $_GET['delete'];

    $sql  = "DELETE FROM mahasiswa WHERE nim = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('s', $nim);

    if ($stmt->execute()) {
        header("Location: index.php?page=mahasiswa&status=delete");
        exit();
    } else {
        echo "Gagal menghapus data: " . $stmt->error;
    }
    $stmt->close();
}
?>
