<?php
$siteTitle = 'CenterPoint LMS';
$headline = 'Empower Learning Anywhere';
$subText = 'Seamless online courses and student progress tracking.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($siteTitle) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('https://www.vecteezy.com/free-vector/dot-pattern');
      background-size: cover;
      background-position: center;
      background-repeat: repeat;
      color: white;
    }
    .hero {
      padding: 100px 0;
      text-align: center;
      background: rgba(0, 0, 0, 0.5);
    }
    .hero img {
      width: 200px;
      animation: fadeIn 2s ease-in-out;
    }
    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }
    .features .icon { font-size: 48px; }
    footer {
      background: #f8f9fa;
      padding: 20px;
      text-align: center;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#"><?= htmlspecialchars($siteTitle) ?></a>
      <div>
        <a class="btn btn-primary" href="login.php">Login</a>
        <a class="btn btn-outline-secondary" href="register.php">Register</a>
      </div>
    </div>
  </nav>

  <section class="hero">
    <div class="container">
      <img src="https://www.vecteezy.com/free-vector/dot-pattern" alt="CenterPoint LMS Logo">
      <h1><?= htmlspecialchars($headline) ?></h1>
      <p class="lead"><?= htmlspecialchars($subText) ?></p>
      <a href="#features" class="btn btn-lg btn-success">Get Started</a>
    </div>
  </section>

  <section id="features" class="features py-5">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-md-4">
          <div class="icon text-primary">🎓</div>
          <h3>Courses</h3>
          <p>Browse and enroll in courses easily.</p>
        </div>
        <div class="col-md-4">
          <div class="icon text-primary">📊</div>
          <h3>Progress Tracking</h3>
          <p>Visualize your progress and completion rate.</p>
        </div>
        <div class="col-md-4">
          <div class="icon text-primary">💬</div>
          <h3>Community</h3>
          <p>Engage with peers and instructors.</p>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($siteTitle) ?>. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
