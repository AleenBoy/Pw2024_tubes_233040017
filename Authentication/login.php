<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: Arial, sans-serif;
    }
    .login-container {
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
    <div class="login-container">
      <h2 class="text-center mb-4" style="color: #dc3545;">Welcome back!</h2>
      <form action="login_process.php" method="POST">
        <div class="form-group">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
      <p class="text-center mt-3">Don't have an account yet? <a href="register.php" style="color: #dc3545;">Register here</a>.</p>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
