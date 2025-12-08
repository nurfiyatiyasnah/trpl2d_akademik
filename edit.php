<?php
require 'koneksi.php';

// Ambil nim dari URL
$nim = $_GET['nim'];

// Ambil data mahasiswa berdasarkan nim
$query = $koneksi->query("SELECT * FROM mahasiswa WHERE nim='$nim'");
$data = $query->fetch_assoc();
?>

<h1>Edit Data Mahasiswa</h1>

<form action="proses.php" method="post">

    <!-- nim sebagai primary key -->
    <input type="hidden" name="nim" value="<?= $data['nim'] ?>">

    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" class="form-control" value="<?= $data['nim'] ?>" disabled>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Mahasiswa</label>
        <input type="text" class="form-control" name="nama_mhs" value="<?= $data['nama_mhs'] ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" required><?= $data['alamat'] ?></textarea>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Simpan</button>
    <a href="index.php?page=mahasiswa" class="btn btn-secondary">Batal</a>

</form>
