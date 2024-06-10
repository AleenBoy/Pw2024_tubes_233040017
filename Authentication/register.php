<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: Arial, sans-serif;
    }
    .register-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      background-color: #1c1e26;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(255,255,255,0.1);
    }
    .form-control {
      background-color: #282c37;
      border: none;
      border-radius: 5px;
      color: #fff;
      margin-bottom: 20px;
    }
    .form-control:focus {
      box-shadow: none;
      background-color: #282c37;
      color: #fff;
    }
    .btn-primary {
      background-color: #dc3545;
      border: none;
      border-radius: 5px;
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #c82333;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="register-container">
      <h2 class="text-center mb-4" style="color: #dc3545;">Create an Account</h2>
      <form action="register_process.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
      </form>
      <p class="text-center mt-3">Already have an account? <a href="login.php" style="color: #dc3545;">Login here</a>.</p>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
