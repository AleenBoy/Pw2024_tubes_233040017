<?php
session_start();

require 'functions.php';

// check kalo data udah di submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ambil data user dari database
    $conn = koneksi();
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // verify buat password
        if (password_verify($password, $user['password'])) {
            // kalo pass benar bakalan nyimpan data user pindah ke indexxxxx
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            // kalo pass salah
            echo "Invalid password";
        }
    } else {
        // kalo ga ditemuin
        echo "User not found";
    }



    mysqli_close($conn);
} else {

    header("Location: login.php");
    exit();
}

?>
