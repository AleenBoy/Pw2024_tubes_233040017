<?php
require 'functions.php';
koneksi();
$search = "";

// cek kalo data udah kesubmit
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// // ambil data dari database pake filter searchh
$sql = "SELECT * FROM product";
if (!empty($search)) {
    $sql .= " WHERE nama LIKE '%$search%' OR deskripsi LIKE '%$search%'";
}

$product = query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>

  <div class="container">
		<h1 class="text-center mt-4 mb-4">Product List</h1>
  <div  class="d-flex justify-content-center">
    <a href="tambah.php" class="btn btn-primary">Insert Product Data</a>
  </div>
        <!-- Search Bar -->
        <div class="row justify-content-center pt-4">
            <div class="col-md-8">
                <form class="d-flex" role="search" method="GET" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?php echo htmlspecialchars($search); ?>">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

		<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NAMA</th>
      <th scope="col">DESKRIPSI</th>
      <th scope="col">GAMBAR</th>
      <th scope="col">VIEW MORE</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php
            // display data prouduct di table
            if (count($product) > 0) {
                foreach ($product as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['deskripsi'] . "</td>";
                    echo "<td><img src='uploads/" . $row['gambar'] . "' style='max-width: 100px; max-height: 100px;' /></td>";
                    echo "<td>" . $row['view_more'] . "</td>";
                    echo "<td>";
                    echo "<a href='editdashboard.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm mb-2 ms-2'>Edit</a>";
                    echo "<a href='dashboard.php?delete_id=" . $row['id'] . "' class='btn btn-danger btn-sm ms-2'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>There are no product data.</td></tr>";
            }
  ?>

</table>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
