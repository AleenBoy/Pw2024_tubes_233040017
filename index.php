<?php
require 'functions.php';
// session_start();
// if (!isset($_SESSION['user'])) {
//     header('Location: login.php');
//     exit();
// }

$product = query("SELECT nama, deskripsi, gambar, view_more FROM product");

$search = "";

// cek kalo searchnya udah ke submit
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// ambil data dari database pake filter search
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
  <title>Company Profile Sporta GYM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="img/sporta logo.png" width="50" height="50"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#membership">Membership</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Product">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#location">Location</a>
          </li>
        </ul>
        <a href="logout.php" class="btn btn-outline-light">Logout</a>
      </div>
    </div>
  </nav>


  <!-- Home -->
  <div class="container-fluid banner">
    <div class="container text-center">
      <h4 class="display-6">Welcome to</h4>
      <h3 class="display-1">SPORTA GYM!</h3>
      <a href="#location">
        <button type="button" class="btn btn-danger btn-lg">
          JOIN WITH US!
        </button>
      </a>
    </div>
  </div>

  <!-- gallery -->
  <div class="container-fluid gallery pt-5 pb-5" id="gallery">
    <div class="container text-center">
      <h2 class="display-6">SPORTA GYM</h2>
      <h2 class="display-4">Gallery</h2>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide w-50 h-50 mx-auto pt-5" data-bs-ride="false">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/s1.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Free weight area</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/s2.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Machine area</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/s3.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Cardio area</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container text-center">
      <p class="pt-4">
        "Embrace the gym, ignite your vitality! Elevate your fitness journey at Sporta. Why gym at Sporta? It's not just
        about sculpting your body; it's a sanctuary for self-improvement. Boost energy, build resilience, and unlock
        your full potential. Sporta Gym – where your wellness story unfolds."
      </p>
    </div>

  </div>

  <!-- Membership -->
  <div class="container-fluid pt-5 pb-5">
    <div class="container text-center">
      <h2 class="display-4" id="membership">Membership</h2>
      <h2 class="display-6">Let's get in shape!</h2>

      <div class="row row-cols-1 row-cols-md-3 g-4 pt-4 pb-5">
        <div class="col">
          <div class="card h-100">
            <img src="img/m1.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Normal</h5>
              <h4 class="display-4">400k / month</h4>
              <p class="card-text">Experience fitness at its best for just 400k/month! Elevate your well-being with our
                exclusive gym membership, your key to a healthier lifestyle.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="img/m2.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Student</h5>
              <h4 class="display-4">300k / month</h4>
              <p class="card-text">Exclusive Student Offer: Elevate your fitness journey for only 300k/month! Grab our
                special gym membership deal and invest in a healthier student lifestyle.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="img/m3.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Visit</h5>
              <h4 class="display-4">25k</h4>
              <p class="card-text">Experience a flexible fitness journey at just 25k per visit! Our pay-per-visit option
                allows you to enjoy the gym on your terms, without a monthly commitment</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

<!-- Available Supplement -->
<div id="Product" class="container-fluid pt-5 pb-5 bg-light">
  <div class="container text-center">
    <h2 class="display-4" id="available-supplement">Available Supplement</h2>
    <h2 class="display-6">Find the right supplement for you!</h2>

    <!-- Invisible Iframe -->
<iframe name="invisibleFrame" style="display:none;"></iframe>

    <!-- Search Bar -->
<div class="row justify-content-center pt-4 mb-3">
    <div class="col-md-8">
        <form class="d-flex" role="search" method="GET" action="">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?php echo htmlspecialchars($search); ?>">
            <button class="btn btn-danger" type="submit" href="#Product">Search</button>
        </form>
    </div>
</div>

<!-- Cards Untuk Product -->
<div class="row">
    <?php
    // check kalo ada product products6
    if (count($product) > 0) {
        // output data untuk tiap product
        foreach ($product as $row) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<img src="uploads/' . $row["gambar"] . '" class="card-img-top" alt="Product Image" style="max-width: 400px; max-height: 350px;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row["nama"] . '</h5>';
            echo '<p class="card-text">' . $row["deskripsi"] . '</p>';
            echo '<a href="' . $row["view_more"] . '" class="btn btn-outline-danger">View More</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p class="text-center">No products found.</p>';
    }
    ?>
</div>


<!-- location & Join-->
<section id="location" class="bg-location">
  <div class="container-fluid" id="join">
    <div class="top-heading">
      <div class="row">
        <p class="pt-3 fs-4 text-secondary mb-0 text-center gorm-heading1">Location</p>
        <p class="pt-1 fs-2 pb fw-bold text-center form-heading2" href="#join">Join With Us Now!</p>
      </div>
    </div>

    <div class="row justify-content-center mt-2">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15940.991563200123!2d107.6334533!3d-2.7427173!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1717cf5e41c1c7%3A0xc743fe3198a5daa2!2sSportaGYM!5e0!3m2!1sen!2sid!4v1703919902831!5m2!1sen!2sid"
        width="600" height="450" style="border:0;" class="mx-auto d-block"></iframe>
    </div>

    <div class="row justify-content-center mt-4">
      <div class="col-12 col-md-8">
        <div class="d-flex justify-content-center">
          <div class="d-flex align-items-center me-5">
            <div class="text-center me-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
              </svg>
            </div>
            <div class="text-start">
              <p class="fs-5 pb-0 mb-0">Location</p>
              <p class="subtext text-nowrap">Jl. K. Yos Sudarso No.18, Tj. Pandan, Belitung, Bangka Belitung 33411</p>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div class="text-center me-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
              </svg>
            </div>
            <div class="text-start">
              <p class="fs-5 pb-0 mb-0">Phone</p>
              <p class="subtext text-nowrap">0877-6613-5523</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>