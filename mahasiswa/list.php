<h1>List Data Mahasiswa</h1>
<a href="index.php?page=create" class="btn btn-primary mb-3">Input Data Mahasiswa</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Prodi</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php
        require 'koneksi.php';

        // query yang benar
        $tampil = $koneksi->query("SELECT m.*, p.nama_prodi FROM mahasiswa m LEFT JOIN prodi p ON m.prodi_id = p.id");

        $no = 1;
        while ($data = $tampil->fetch_assoc()) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nim'] ?></td>
            <td><?= $data['nama_mhs'] ?></td>
            <td><?= $data['tgl_lahir'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= !empty($data['nama_prodi']) ? $data['nama_prodi'] : '-'; ?></td>

            <td>
                <!-- Edit berdasarkan NIM -->
                <a href="index.php?page=edit&nim=<?= $data['nim'] ?>" 
                   class="btn btn-warning btn-sm">Edit</a>

                <!-- Delete berdasarkan NIM -->
                <a href="proses.php?delete=<?= $data['nim'] ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>

</table>
