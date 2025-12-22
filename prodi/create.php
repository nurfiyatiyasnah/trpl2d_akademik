<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Data Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  
  <body>
    <div class="container my-4">
      <h1>Input Data Program Studi Mahasiswa</h1>

      <form action="proses.php" method="post">
        <div class="mb-3">
          <label for="id" class="form-label">ID Program Studi</label>
          <input type="text" class="form-control" id="id" name="id">
        </div>

        <div class="mb-3">
          <label for="nama_prodi" class="form-label">Nama Program Studi</label>
          <input type="text" class="form-control" id="nama_prodi" name="nama_prodi">
        </div>

        <div class="mb-3">
          <label class="form-label">Jenjang</label>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="jenjang" id="jenjang_d2" value="D2">
            <label class="form-check-label" for="jenjang_d2">D2</label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="jenjang" id="jenjang_d3" value="D3" checked>
            <label class="form-check-label" for="jenjang_d3">D3</label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="jenjang" id="jenjang_d4" value="D4">
            <label class="form-check-label" for="jenjang_d4">D4</label>
          </div>
        </div>

        <div class="mb-3">
          <label for="keterangan" class="form-label">Keterangan</label>
          <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
        </div>

        <div>
          <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
          <a href="index.php" class="btn btn-secondary">Lihat Data Prodi</a>
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
