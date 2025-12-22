<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'koneksi.php';

/* ================================
   INSERT DATA PRODI
================================ */
if (isset($_POST['submit'])) {

    $id          = (int) $_POST['id'];
    $nama_prodi  = $_POST['nama_prodi'];
    $jenjang     = $_POST['jenjang'];
    $keterangan  = $_POST['keterangan'];

    $query = "INSERT INTO prodi (id, nama_prodi, jenjang, keterangan)
              VALUES (?, ?, ?, ?)";
    $stmt  = $koneksi->prepare($query);
    $stmt->bind_param('isss', $id, $nama_prodi, $jenjang, $keterangan);

    if ($stmt->execute()) {
        header("Location: index.php?page=prodi&status=berhasil");
        exit();
    } else {
        echo "Gagal menyimpan data prodi: " . $stmt->error;
    }
    $stmt->close();
}

/* ================================
   UPDATE DATA PRODI
================================ */
if (isset($_POST['update'])) {

    $id          = (int) $_POST['id'];
    $nama_prodi  = $_POST['nama_prodi'];
    $jenjang     = $_POST['jenjang'];
    $keterangan  = $_POST['keterangan'];

    $query = "UPDATE prodi
              SET nama_prodi = ?, jenjang = ?, keterangan = ?
              WHERE id = ?";
    $stmt  = $koneksi->prepare($query);
    $stmt->bind_param('sssi', $nama_prodi, $jenjang, $keterangan, $id);

    if ($stmt->execute()) {
        header("Location: index.php?page=prodi&status=update");
        exit();
    } else {
        echo "Gagal mengupdate data prodi: " . $stmt->error;
    }
    $stmt->close();
}

/* ================================
   DELETE DATA PRODI
================================ */
if (isset($_GET['id_prodi'])) {

    $id = (int) $_GET['id_prodi'];

    // Cek relasi ke tabel mahasiswa
    $sqlCheck = "SELECT COUNT(*) AS cnt FROM mahasiswa WHERE prodi_id = $id";
    $result   = $koneksi->query($sqlCheck);
    $row      = $result->fetch_assoc();

    if ($row['cnt'] > 0) {
        echo 'Tidak dapat menghapus prodi karena masih ada mahasiswa yang terkait.';
        exit();
    }

    // Hapus prodi
    $sqlDel = "DELETE FROM prodi WHERE id = $id";
    if ($koneksi->query($sqlDel)) {
        header("Location: index.php?page=prodi&status=delete");
        exit();
    } else {
        echo 'Gagal menghapus data prodi: ' . $koneksi->error;
    }
}
?>
