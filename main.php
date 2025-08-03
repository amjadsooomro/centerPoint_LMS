<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>E-Learning Portal</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet">

  <style>
    :root {
      --primary: #4E6688;
      --light-bg: #F2F2F2;
    }

    body {
      background-color: var(--light-bg);
      font-family: 'Segoe UI', sans-serif;
    }

    /* Navbar */
    .navbar-custom {
      background-color: var(--primary);
    }

    .navbar-custom .navbar-brand,
    .navbar-custom .nav-link {
      color: var(--light-bg);
      font-weight: 500;
    }

    .navbar-custom .nav-link:hover {
      color: #fff;
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 5px;
    }

    /* Cards */
    .card {
      border-radius: 12px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
    }

    .card h4 {
      font-weight: 600;
    }

    .btn-primary {
      background-color: var(--primary);
      border: none;
    }

    .btn-primary:hover {
      background-color: #3a4e6b;
    }

    .list-group-item {
      background-color: var(--light-bg);
      border: none;
    }

    .mdi {
      margin-right: 6px;
    }
    
 
    .hero-gradient {
      background: linear-gradient(to right, #4e6688, #8f9bb3);
      color: white;
      padding: 80px 20px;
    }

    .carousel-item h1 {
      font-size: 2.8rem;
      font-weight: bold;
    }

    .carousel-item p {
      font-size: 1.2rem;
      margin-bottom: 20px;
    }

    .carousel-indicators [data-bs-target] {
      background-color: #fff;
    }

    .btn-light-outline {
      background-color: transparent;
      border: 2px solid #fff;
      color: #fff;
      transition: all 0.3s ease;
    }

    .btn-light-outline:hover {
      background-color: #fff;
      color: #4e6688;
    }

    @media (max-width: 768px) {
      .carousel-item h1 {
        font-size: 1.8rem;
      }
      .carousel-item p {
        font-size: 1rem;
      }
    }
  </style>
  </style>
</head>
<body>

  <!-- ✅ Top Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">🎓 E-Learning</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon text-white"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-home"></i>Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-file-document-box"></i>About</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-book-open-page-variant"></i>Exam</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-account-group"></i>Faculty</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-login"></i>Login</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-account-plus"></i>Register</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- ✅ Hero Section with Gradient Slider -->
  <section class="hero-gradient">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
      <!-- Indicators -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
      </div>

      <!-- Slides -->
      <div class="carousel-inner text-center">
        <div class="carousel-item active">
          <h1>📘 Welcome to E-Learning</h1>
          <p>Learn anytime, anywhere with expert-led courses</p>
          <a href="#" class="btn btn-light-outline">Explore Courses</a>
        </div>
        <div class="carousel-item">
          <h1>🎯 Interactive Classes</h1>
          <p>Live sessions, assignments, and quizzes to boost your skills</p>
          <a href="#" class="btn btn-light-outline">Join Now</a>
        </div>
        <div class="carousel-item">
          <h1>👩‍🏫 Qualified Instructors</h1>
          <p>Our faculty is dedicated to your success</p>
          <a href="#" class="btn btn-light-outline">Meet the Team</a>
        </div>
      </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </section>

  <!-- ✅ Main Section -->
  <div class="container mt-5">
    <div class="row">
      <!-- 🔐 Login Form -->
      <div class="col-md-6 mb-4">
        <div class="card p-4 bg-white">
          <h4 class="mb-3 text-primary">🔐 Login</h4>
          <form action="login.php" method="POST">
            <div class="mb-3">
              <label>Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email" required />
            </div>
            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password" required />
            </div>
            <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input" id="rememberMe" />
              <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
        </div>
      </div>

      <!-- 🗒️ Notes Board -->
      <div class="col-md-6 mb-4">
        <div class="card p-4 bg-white">
          <h4 class="mb-3 text-success">🗒️ Notes Board</h4>
          <ul class="list-group">
            <li class="list-group-item">📌 Orientation on Monday</li>
            <li class="list-group-item">📅 Submit exam forms by 10th Aug</li>
            <li class="list-group-item">📧 Contact admin for password reset</li>
            <li class="list-group-item">📚 Internal assessments next week</li>
            <li class="list-group-item">🖥️ Lab schedule updated</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ✅ Footer (optional) -->
  <footer class="text-center py-3 text-muted" style="background: #F2F2F2;">
    © 2025 E-Learning Platform
  </footer>

  <!-- ✅ Bootstrap Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
