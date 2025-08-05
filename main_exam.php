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
    .navbar-brand img {
  height: 600px;
  width: auto;
  max-width: none;
  object-fit: contain;
}

  </style>
  </style>
</head>
<body background="Assets"><nav class="navbar navbar-expand-lg shadow-sm py-1" style="background-color: #ffffff;">
  <div class="container d-flex align-items-center justify-content-between">

    <!-- Logo on the Left -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="Assets/images/a-logo.png" alt="Logo" style="height: 120px; width: auto; max-width: none; object-fit: contain;">
    </a>

    <!-- Navbar Toggler (Mobile) -->
    <button class="navbar-toggler text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Centered Nav Links -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav text-center">
        <li class="nav-item px-3">
          <a class="nav-link text-dark" href="#"><i class="mdi mdi-home me-1"></i>Home</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link text-dark" href="#"><i class="mdi mdi-file-document-box me-1"></i>About</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link text-dark" href="main_exam.php"><i class="mdi mdi-book-open-page-variant me-1"></i>Exam</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link text-dark" href="#"><i class="mdi mdi-account-group me-1"></i>Faculty</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link text-dark" href="#"><i class="mdi mdi-login me-1"></i>Login</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link text-dark" href="#"><i class="mdi mdi-account-plus me-1"></i>Register</a>
        </li>
      </ul>
    </div>

  </div>
</nav>

<?php
// Include the database connection file
include_once 'Database/connect.php';
include_once 'Roles/functions.php';

// Create a new instance of the Database class
$dbObj = new Database();
$db = $dbObj->getConnection();

// Query to fetch the examination records
$stmt = $db->query("SELECT * FROM examination ORDER BY created_at DESC");

$statusMsg = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        $statusMsg = '<div class="alert alert-success">✔️ Examination submitted successfully.</div>';
    }
}
?>

<!-- HTML and Bootstrap Card Layout to Display Data -->

<div class="container my-5">
  <?php
    // Fetch records from the database and display them
    while ($row = $stmt->fetch_assoc()):
  ?>
    <div class="row mb-4">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['subject']) ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($row['instructor']) ?></h6>
            <p class="card-text"><strong>Date & Time:</strong> <?= htmlspecialchars($row['date_time']) ?></p>
            <p class="card-text"><strong>Time Slot:</strong> <?= htmlspecialchars($row['time_slot']) ?></p>
            <p class="card-text"><strong>Message:</strong> <?= htmlspecialchars($row['message']) ?></p>
            <p class="card-text"><strong>Status:</strong> 
              <?php if ($row['status']): ?>
                <span class="badge bg-success">Active</span>
              <?php else: ?>
                <span class="badge bg-secondary">Inactive</span>
              <?php endif; ?>
            </p>
            <div class="d-flex justify-content-between">
              <div>
                <?php if ($row['link_share']): ?>
                  <a href="<?= htmlspecialchars($row['link_share']) ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                    <i class="fa fa-link"></i> Link
                  </a>
                <?php endif; ?>

                <?php if ($row['attachment']): ?>
                  <a href="<?= htmlspecialchars($row['attachment']) ?>" class="btn btn-sm btn-outline-secondary" target="_blank">
                    <i class="fa fa-paperclip"></i> Attachment
                  </a>
                <?php endif; ?>
              </div>
              <div>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                  <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this exam record?');">
                  <i class="fa fa-trash"></i> Delete
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>

  <!-- ✅ Footer (optional) -->
  <footer class="text-center py-3 text-muted" style="background: #F2F2F2;">
    © 2025 E-Learning Platform
  </footer>

  <!-- ✅ Bootstrap Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
