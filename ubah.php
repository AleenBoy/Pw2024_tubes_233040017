<?php
require 'functions.php';

// ambil data produk dari ID
$id = $_GET['id'];
$pdc = query("SELECT * FROM product WHERE id = $id")[0];

// kalo tombol ubah di klik
if (isset($_POST['ubah'])) {
    // tambahkan data gambar lama ke dalam array $_POST
    $_POST['gambar_lama'] = $pdc['gambar'];

    //  data berhasil diubah
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('data berhasil diubah');
                document.location.href = 'dashboard.php';
              </script>";
    } else {
        echo "<script>
                alert('data gagal diubah');
                document.location.href = 'dashboard.php';
              </script>";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ubah data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

<body>

    <div class="container col-8">
    <H1>Product Edit Form</H1>

    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $pdc['id']; ?>">
        <div class="mb-3">
    <label for="nama" class="form-label">Name</label>
    <input type="text" class="form-control" id="Nama" name="nama" required value="<?= $pdc['nama'];?>">
        </div>
    <div class="mb-3">
    <label for="deskripsi" class="form-label">Description</label>
    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required value="<?= $pdc['deskripsi'];?>">
        </div>
    <div class="mb-3">
    <label for="gambar" class="form-label">Image</label>
    <input type="file" class="form-control" id="gambar" name="gambar" accept= "image/*" required value="<?= $pdc['gambar'];?>">
        </div>
    <div class="mb-3">
    <label for="view_more" class="form-label">View More</label>
    <input type="url" class="form-control" id="view_more" name="view_more" required value="<?= $pdc['view_more'];?>">
        </div>
        <button type="submit" name="ubah" value="<?= $pdc['nama'];?>" class="btn btn-primary">Edit Data</button>
    </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>