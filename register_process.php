<?php
include 'functions.php';

// check udah ke submit apa blom
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ambil dari data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // hash password (nyembunyiin)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // set default untuk role
    $role = 'user';

    // masukin datauser ke database dengan default role
    $conn = koneksi();
    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', '$role')";
    if (mysqli_query($conn, $query)) {
        // registrasi sukses, redirect klogin page
        header("Location: login.php");
        exit();
    } else {
        // kalo eror 
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }


    mysqli_close($conn);
} else {

    header("Location: register.php");
    exit();
}
?>
