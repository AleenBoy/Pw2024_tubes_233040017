<?php
require '../Functions/functions.php';

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

$product = cari($keyword);

if (count($product) > 0) {
    foreach ($product as $row) {
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="uploads/' . htmlspecialchars($row["gambar"]) . '" class="card-img-top" alt="Product Image" style="max-width: 400px; max-height: 350px;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($row["nama"]) . '</h5>';
        echo '<p class="card-text">' . htmlspecialchars($row["deskripsi"]) . '</p>';
        echo '<a href="' . htmlspecialchars($row["view_more"]) . '" class="btn btn-outline-danger">View More</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p class="text-center">No products found.</p>';
}
?>
