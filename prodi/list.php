<?php
require 'koneksi.php';

$sql   = "SELECT * FROM prodi ORDER BY nama_prodi";
$query = $koneksi->query($sql);
?>

<h1>Data Program Studi</h1>
<a href="index.php?page=create" class="btn btn-primary mb-3">Input Data Prodi</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>ID</th>
      <th>Nama Prodi</th>
      <th>Jenjang</th>
      <th>Keterangan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; while ($row = $query->fetch_assoc()) { ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['id']; ?></td>
        <td><?= $row['nama_prodi']; ?></td>
        <td><?= $row['jenjang']; ?></td>
        <td><?= $row['keterangan']; ?></td>
        <td>
          <a href="index.php?page=edit&id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
            Edit
          </a>
          <a href="proses.php?id_prodi=<?= $row['id']; ?>"
             class="btn btn-danger btn-sm"
             onclick="return confirm('Yakin hapus prodi ini?');">
            Delete
          </a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
