<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Learning Portal</title>

  <!-- Bootstrap & MDI Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">

  <style>
    :root {
      --primary-color: #4E6688;
      --accent-color: #8F9BB3;
      --bg-light: #f5f7fa;
    }

    body {
      background-color: var(--bg-light);
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      background-color: var(--primary-color);
    }

    .navbar .nav-link {
      color: white !important;
      font-weight: 500;
    }

    .navbar-brand {
      font-weight: bold;
      color: #fff !important;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
    }

    .card h4 i {
      margin-right: 8px;
    }

    .list-group-item i {
      margin-right: 8px;
      color: var(--primary-color);
    }

    .btn-primary {
      background-color: var(--primary-color);
      border: none;
    }

    .btn-primary:hover {
      background-color: #3B4F6B;
    }
  </style>
</head>
<body>

  <!-- ✅ Top Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
     <a class="navbar-brand d-flex align-items-center" href="#">
  <img src="Assets/images/a-logo.png" alt="Logo" style="height: 40px; margin-right: 10px;">
  <span class="fw-bold text-white">E-Learning Portal</span>WEEWE
</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-home"></i>Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-information-outline"></i>About</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-book-open-variant"></i>Exam</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-account-group-outline"></i>Faculty</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-login-variant"></i>Login</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-account-plus-outline"></i>Register</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- ✅ Main Content -->
  <div class="container mt-5">
    <div class="row">
      
      <!-- 🔐 Login Form -->
      <div class="col-md-6 mb-4">
        <div class="card p-4">
          <h4 class="mb-3 text-primary"><i class="mdi mdi-lock-outline"></i>Login</h4>
          <form action="login.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
        </div>
      </div>

      <!-- 🗒️ Notes Board -->
      <div class="col-md-6 mb-4">
        <div class="card p-4">
          <h4 class="mb-3 text-success"><i class="mdi mdi-note-multiple-outline"></i>Notes Board</h4>
          <ul class="list-group">
            <li class="list-group-item"><i class="mdi mdi-pin"></i>Orientation on Monday</li>
            <li class="list-group-item"><i class="mdi mdi-calendar-range"></i>Submit exam forms by 10th Aug</li>
            <li class="list-group-item"><i class="mdi mdi-email-outline"></i>Contact admin for password reset</li>
            <li class="list-group-item"><i class="mdi mdi-book-outline"></i>Internal assessments next week</li>
            <li class="list-group-item"><i class="mdi mdi-monitor-dashboard"></i>Lab schedule updated</li>
          </ul>
        </div>
      </div>

    </div>
  </div>

  <!-- ✅ Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
