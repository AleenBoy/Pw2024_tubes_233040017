<?php
require '../Functions/functions.php';
koneksi();
$search = "";

// cek kalo data udah kesubmit
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// // ambil data dari database pake filter searchh
$sqlusers = "SELECT * FROM users";
if (!empty($search)) {
    $sqlusers .= " WHERE username LIKE '%$search%' OR email LIKE '%$search%'";
}

$users = queryusers($sqlusers);

$roles = [
    '1' => 'admin',
    '2' => 'user'
];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>user dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <!-- Above Button -->
        <div class="d-flex justify-content-end mt-3">
            <a href="../crud/dashboard.php" class="btn btn-danger me-2">Dashboard Product</a>
            <a href="../index.php" class="btn btn-secondary">Landing Page</a>
        </div>
        <h1 class="text-center mt-4 mb-4">Users List</h1>
        <!-- Search Bar -->
        <div class="row justify-content-center pt-4">
            <div class="col-md-8">
                <form class="d-flex" role="search" method="GET" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search" value="<?php echo htmlspecialchars($search); ?>">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ROLE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                if (count($users) > 0) {
                    foreach ($users as $row) {
                        ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= htmlspecialchars($row['username']); ?></td>
                            <td><?= htmlspecialchars($row['email']); ?></td>
                            <td>
                                <form method="POST" action="update_role.php">
                                    <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
                                    <select name="role" onchange="this.form.submit()">
                                        <?php foreach ($roles as $key => $value) { ?>
                                            <option value="<?= $key; ?>" <?= $key == $row['id_role'] ? 'selected' : ''; ?>>
                                                <?= $value; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <a href="hapususer.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm ms-2">Delete</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6" class="text-center">There are no users data.</td>
                    </tr>
                <?php } ?>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>