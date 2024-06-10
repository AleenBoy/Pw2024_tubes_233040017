<?php
require '../Functions/functions.php';

// cek udah disubmit apa belom formnya
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    if(isset($_POST['role'])) {
        $role_id = $_POST['role'];
    } else {
        // klo ngga ada, asumsiin aja jadi 'user'
        $role_id = 2; // misalnya, anggap role defaultnya 'user'
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // masukin data user ke database, pake role yang dipilih tadi

    $conn = koneksi();
    $query = "INSERT INTO users (username, email, password, id_role) VALUES ('$username', '$email', '$hashed_password', '$role_id')";
    if (mysqli_query($conn, $query)) {
        header("Location: login.php");
        exit();
    } else {

        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {

    header("Location: register.php");
    exit();
}
?>
