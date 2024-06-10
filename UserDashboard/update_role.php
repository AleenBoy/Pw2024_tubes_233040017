<?php
require '../Functions/functions.php';

$conn = koneksi();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $new_role = $_POST['role'];

    // update role di database
    $query = "UPDATE users SET id_role = '$new_role' WHERE id = '$user_id'";
    if (mysqli_query($conn, $query)) {
        mysqli_close($conn);
        header("Location: userdashboard.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>


