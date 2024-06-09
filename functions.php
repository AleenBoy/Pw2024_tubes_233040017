<?php

// untuk koneksi ke database
function koneksi() {
    $conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040017');
    if (!$conn) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }
    return $conn;
}

// njalanin query dan mengembaliin hasil ke bentuk array
function query($query) {
    $conn = koneksi();
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_close($conn);
    return $rows;
}


// nambahin data
function tambah($data) {
    $conn = koneksi();
    $nama = htmlspecialchars($data['nama']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $gambar = htmlspecialchars($data['gambar']);
    
    // potong data view_more jika kepanjangan
    $view_more = htmlspecialchars($data['view_more']);
    if (strlen($view_more) > 255) { // ganti 255 dengan panjang maksimum kolom 'view_more' di database Anda
        $view_more = substr($view_more, 0, 255);
    }

    $query = "INSERT INTO product (nama, deskripsi, gambar, view_more)
              VALUES ('$nama', '$deskripsi', '$gambar', '$view_more')";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    $affected_rows = mysqli_affected_rows($conn);
    mysqli_close($conn);
    return $affected_rows;
}

// hapus data
function hapus($id) {
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM product WHERE id = $id") or die(mysqli_error($conn));
    $affected_rows = mysqli_affected_rows($conn);
    mysqli_close($conn);
    return $affected_rows;
}

// ngubah data
function ubah($data) {
    $conn = koneksi();
    $id = htmlspecialchars($data['id']);
    $nama = htmlspecialchars($data['nama']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    
    // potong data view_more kalo kepanjangan
    $view_more = htmlspecialchars($data['view_more']);
    if (strlen($view_more) > 255) { // ganti 255 dengan panjang maksimum kolom 'view_more' di database Anda
        $view_more = substr($view_more, 0, 255);
    }

    // cek kalo ada gambar baru yang diupload
    if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);
    } else {
        $gambar = htmlspecialchars($data['gambar_lama']); // Jika tidak ada gambar baru, gunakan gambar lama
    }

    $query = "UPDATE product SET
              nama = '$nama',
              deskripsi = '$deskripsi',
              gambar = '$gambar',
              view_more = '$view_more'
              WHERE id = $id";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    $affected_rows = mysqli_affected_rows($conn);
    mysqli_close($conn);
    return $affected_rows;
}

    // searching biasa (pusing gw pake ajax)
function searchProducts($query) {
    $conn = koneksi();
    $query = "SELECT * FROM product WHERE nama LIKE '%$query%' OR deskripsi LIKE '%$query%'";
    $result = mysqli_query($conn, $query);
    $results = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $results[] = $row;
    }
    mysqli_close($conn);

    return $results;
}
?>