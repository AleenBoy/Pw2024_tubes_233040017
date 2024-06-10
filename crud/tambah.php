<?php
require '../Functions/functions.php';

// insert gambar
if (isset($_POST['submit'])) {
    $conn = koneksi();
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);

    $query = "INSERT INTO product (gambar) VALUES ('$gambar')";
    $result = mysqli_query($conn, $query);

    header("Location: dashboard.php");
    exit();
}

// kalo tombol tambah di klik
if (isset($_POST['tambah'])) {
    $_POST['gambar'] = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], '../uploads/' . $_POST['gambar']);
    
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'dashboard.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan');
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
    <title>Tambah Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container col-8">
        <h1>Insert Product Data Form</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Name</label>
                <input type="text" class="form-control" id="Nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Description</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Image</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="view_more" class="form-label">View More</label>
                <input type="url" class="form-control" id="view_more" name="view_more" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Add Data</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
