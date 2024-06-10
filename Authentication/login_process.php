<?php
session_start();

require '../Functions/functions.php';

// cek data udah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ngambil data user dari database

    $conn = koneksi();
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            // // kalo pass benar, simpan trus arahin sesuai role
            $_SESSION['user_id'] = $user['id'];
            $role_query = "SELECT role FROM roles WHERE id_role={$user['id_role']}";
            $role_result = mysqli_query($conn, $role_query);
            $role_row = mysqli_fetch_assoc($role_result);
            $_SESSION['user_role'] = $role_row['role'];

            if ($_SESSION['user_role'] == 'admin') {
                header("Location: ../crud/dashboard.php");
                exit();
            } else {
                header("Location: ../index.php");
                exit();
            }
        } else {
            echo "<script>
            alert('Invalid password');
            document.location.href = 'login.php';
          </script>";
        }
    } else {
        echo "<script>
            alert('User not found');
            document.location.href = 'login.php';
          </script>";
    }

    mysqli_close($conn);
} else {

    header("Location: login.php");
    exit();
}
?>
