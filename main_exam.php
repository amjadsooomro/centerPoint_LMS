<?php
// index.php
require_once 'Database/connect.php';


require_once 'Roles/functions.php';

$db = (new Database())->getConnection();
$result = $db->query("SELECT * FROM examination ORDER BY created_at DESC");

$statusMsg = '';
if (isset($_GET['status']) && $_GET['status'] === 'success') {
    $statusMsg = '<div class="alert alert-success">✔️ Examination submitted successfully.</div>';
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF‑8">
  <meta name="viewport" content="width=device‑width, initial‑scale=1">
  <title>E‑Learning Portal</title>
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
    .navbar {
      min-height: 40px !important;
      height: 40px !important;
    }
    .navbar-brand, .navbar-nav .nav-link {
      padding-top: 0 !important;
      padding-bottom: 0 !important;
      line-height: 40px !important;
      font-size: 0.9rem;
    }
    .navbar-toggler {
      padding: 0.25rem 0.75rem;
      margin-top: 4px;
      margin-bottom: 4px;
    }
    .navbar .container, .navbar-collapse {
      display: flex;
      align-items: center;
    }

    .card-gradient {
      background: linear-gradient(135deg, #cad4e2ff, #030d20ff);
      color: #fff;
      border: none;
      border-radius: 12px;
      /* small default shadow */
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card-gradient:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
    }
    .card-gradient .card-header {
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
    }
    .lab-field {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
    }
    .message-box {
      height: 150px;
      overflow-y: auto;
    }
    footer {
      background: var(--light-bg);
    }
    /* size and color utility classes for icons */
.mdi-24px { font-size: 24px; vertical-align: middle; }
.icon-blue    { color: #1E88E5; }  /* date/time */
.icon-green   { color: #4CAF50; }  /* instructor */
.icon-amber   { color: #FFB300; }  /* time slot */
.icon-indigo  { color: #3F51B5; }  /* lab */
.icon-red     { color: #E53935; }  /* message / attachment / link */
  /* Make card container relative for absolute children */
  .card-relative { position: relative; }

  /* Box styling for Lab label (top-right corner) */
  .lab-box {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
    background-color: #ffca28;
    color: #212121;
    padding: 0.2rem 0.5rem;
    border-radius: 0.25rem;
    font-weight: 600;
    font-size: 0.9rem;
    z-index: 10;
    box-shadow: 0 1px 4px rgba(0,0,0,0.2);
  }

  /* Box styling for Instructor label (bottom-right corner) */
  .instructor-box {
    position: absolute;
    bottom: 0.5rem;
    right: 0.5rem;
    background-color: #66bb6a;
    color: #fff;
    padding: 0.2rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.9rem;
    z-index: 10;
    box-shadow: 0 1px 4px rgba(0,0,0,0.2);
  }
  </style>
</head>
<body>
  <!-- Navbar same as yours -->
  <nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="Assets/images/a-logo.png" alt="Logo" style="height:30px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav text-center">
          <li class="nav-item px-2"><a class="nav-link text-dark" href="#"><i class="mdi mdi-home me-1"></i>Home</a></li>
          <li class="nav-item px-2"><a class="nav-link text-dark" href="#"><i class="mdi mdi-file-document-box me-1"></i>About</a></li>
          <li class="nav-item px-2"><a class="nav-link text-dark" href="index.php"><i class="mdi mdi-book-open-page-variant me-1"></i>Exam</a></li>
          <li class="nav-item px-2"><a class="nav-link text-dark" href="#"><i class="mdi mdi-account-group me-1"></i>Faculty</a></li>
          <li class="nav-item px-2"><a class="nav-link text-dark" href="#"><i class="mdi mdi-login me-1"></i>Login</a></li>
          <li class="nav-item px-2"><a class="nav-link text-dark" href="#"><i class="mdi mdi-account-plus me-1"></i>Register</a></li>
        </ul>
      </div>
    </div>
</nav>

<div class="container mt-4">
  <?= $statusMsg ?? '' ?>
  <div class="row">
    <?php if ($result && $result->num_rows): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="col-md-6 col-lg-4 d-flex">
          <div class="card shadow-sm mb-4 h-100 card-relative">
            <!-- Lab box -->
            <div class="lab-box">
              Lab <?= htmlspecialchars($row['lab'] ?? '–') ?>
            </div>

            <!-- Instructor box -->
            <div class="instructor-box">
              <?= htmlspecialchars($row['instructor'] ?? '–') ?>
            </div>

            <div class="card-header">
              <h5 class="mb-0">
                <i class="mdi mdi-book-open-page-variant mdi-24px icon-indigo me-1"></i>
                <?= htmlspecialchars($row['subject']) ?> Exam
              </h5>
            </div>
            <div class="card-body d-flex flex-column">
              <p>
                <i class="mdi mdi-calendar-clock-outline mdi-24px icon-blue me-2"></i>
                <strong>Date & Time:</strong> <?= htmlspecialchars($row['date_time']) ?>
              </p>
              <p>
                <i class="mdi mdi-timetable mdi-24px icon-amber me-2"></i>
                <strong>Time Slot:</strong> <?= htmlspecialchars($row['time_slot']) ?>
              </p>
              <p>
                <i class="mdi mdi-message mdi-24px icon-red me-2"></i>
                <strong>Message:</strong>
              </p>
              <div class="position-relative mb-3">
                <textarea id="msg-<?= $row['id'] ?>"
                          class="form-control message-box" readonly><?= htmlspecialchars($row['message'] ?? '') ?></textarea>
                <button class="btn btn-sm btn-outline-secondary copy-btn"
                        onclick="copyMessage('msg-<?= $row['id'] ?>')">
                  <i class="mdi mdi-content-copy mdi-24px icon-red me-1"></i> Copy
                </button>
              </div>
              <?php if (!empty($row['attachment'])): ?>
                <p>
                  <i class="mdi mdi-paperclip mdi-24px icon-red me-2"></i>
                  <strong>Attachment:</strong>
                  <a href="<?= htmlspecialchars($row['attachment']) ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                    <i class="mdi mdi-download mdi-24px icon-green me-1"></i> Download
                  </a>
                </p>
              <?php endif; ?>
              <?php if (!empty($row['link_share'])): ?>
                <p>
                  <i class="mdi mdi-link mdi-24px icon-red me-2"></i>
                  <strong>Shared Link:</strong>
                  <a href="<?= htmlspecialchars($row['link_share']) ?>" class="btn btn-sm btn-outline-info" target="_blank">
                    <i class="mdi mdi-open-in-new mdi-24px icon-green me-1"></i> Open
                  </a>
                </p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="col-12"><div class="alert alert-warning">No exam details available.</div></div>
    <?php endif; ?>
  </div>
</div>

<script>
function copyMessage(id) {
  const ta = document.getElementById(id);
  ta.select();
  document.execCommand('copy');
  alert('✅ Message copied to clipboard!');
}

function isIE() {
  return /MSIE |Trident\//.test(window.navigator.userAgent);
}

if (!isIE()) {
  alert('⚠️ This link works best in Internet Explorer or Edge IE mode. Please open it manually.');
}

</script>
