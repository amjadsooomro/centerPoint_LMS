<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mailing Examination</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Quill Editor -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <!-- Optional Plugins CSS -->
  <link rel="stylesheet" href="assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
  <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/images/favicon.png" />

  <style>
    #editor {
      height: 200px;
      background-color: #fff;
    }
    .nav .nav-item .nav-link.active {
  background-color: #0d6efd; /* Bootstrap Primary */
  color: #fff;
}
.menu-teitl{
  background-color: #71797E;;
}
#one{

    background-color: slategray;

} 




</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <!-- Header and Sidebar -->
  <?php include("header.php"); ?>





  <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="exam.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Examation</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Form elementssefswrf</span>
        <i class="menu-arrow"></i>
      </a>
  
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Charts</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Tables</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
        <i class="icon-ban menu-icon"></i>
        <span class="menu-title">Error pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="error">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../../../docs/documentation.html">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
  </ul>
</nav>

<?php

// Autoload classes including Examination
include_once 'functions.php';
$exam = new Examination();

// Validate ID from GET
if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die('Invalid request');
}
$id = (int)$_GET['id'];

// Handle POST update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize fields
    $subject    = trim($_POST['subject'] ?? '');
    $semester   = trim($_POST['semester'] ?? '');
    $instructor = trim($_POST['instructor'] ?? '');
    $lab        = trim($_POST['lab'] ?? '');
    $dtRaw      = trim($_POST['date'] ?? '');
    $date_time  = preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/', $dtRaw)
                    ? str_replace('T', ' ', $dtRaw) . ':00'
                    : null;
    $time_slot  = trim($_POST['time'] ?? '');
    $message    = trim($_POST['messageHtml'] ?? '');
    $link_share = filter_var(trim($_POST['link_share'] ?? ''), FILTER_VALIDATE_URL)
                   ?: null;

    if (!$date_time) {
        die('Invalid date/time format.');
    }

    // Handle file attachment (keep previous if none new uploaded)
    $record = $exam->fetchOne($id);
    if (!$record) {
        die('Record not found.');
    }
    $attachment = $record['attachment'];

    if (!empty($_FILES['attachment']['name']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $orig = $_FILES['attachment']['name'];
        $ext = strtolower(pathinfo($orig, PATHINFO_EXTENSION));
        $base = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($orig, PATHINFO_FILENAME));
        $target = $uploadDir . date('YmdHis') . "_{$base}." . $ext;
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $target)) {
            $attachment = 'uploads/' . basename($target);
        }
    }

    // Execute update
    if ($exam->update($id, $subject, $semester, $instructor, $lab,
                      $date_time, $time_slot, $message, $link_share)) {
        header('Location: dashorad.php?status=success');
        exit;
    } else {
        echo '<div class="alert alert-danger">Failed to update record.</div>';
    }
    exit;
}


$date_formatted = date('Y-m-d\TH:i', strtotime($record['date_time']));
?>
<body class="bg-light">
 <div class="container my-5">
  <div class="card shadow-sm">
    <div class="card-header border-bottom bg-primary text-white">
      <h5 class="mb-0">Edit Examination</h5>
    </div>
    <div class="card-body p-4">
      <form enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id" value="<?= $record['id'] ?>">

        <!-- Subject -->
        <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Subject</label>
          <input type="text" name="subject" class="form-control"
                 required value="<?= htmlspecialchars($record['subject']) ?>">
        </div>

        <!-- Semester -->
        <div class="col-md-6 mb-3">
          <label class="form-label">Semester</label>
          <input type="text" name="semester" class="form-control"
                 required value="<?= htmlspecialchars($record['semester']) ?>">
        </div>

        <!-- Instructor -->
        <div class="col-md-6 mb-3">
          <label class="form-label">Instructor</label>
          <input type="text" name="instructor" class="form-control"
                 required value="<?= htmlspecialchars($record['instructor']) ?>">
        </div>

        <!-- Lab -->
        <div class="col-md-6 mb-3">
          <label class="form-label">Lab</label>
          <input type="text" name="lab" class="form-control"
                 required value="<?= htmlspecialchars($record['lab']) ?>">
        </div>

        <!-- Date & Time -->
        <div class="col-md-6 mb-3">
          <label class="form-label">Date & Time</label>
          <input type="datetime-local" name="date" class="form-control"
                 required value="<?= $date_formatted ?>">
        </div>

        <!-- Time Slot -->
        <div class="col-md-6 mb-3">
          <label class="form-label">Time Slot</label>
          <input type="text" name="time" class="form-control"
                 required value="<?= htmlspecialchars($record['time_slot']) ?>">
        </div>

        <!-- Shareable Link -->
        <div class="col-md-12 mb-3">
          <label class="form-label">Shareable Link</label>
          <input type="url" name="link_share" class="form-control"
                 value="<?= htmlspecialchars($record['link_share']) ?>">
        </div>
        </div>

        <!-- Message -->
        <div class="mb-3">
          <label class="form-label">Message</label>
          <textarea name="messageHtml" class="form-control" rows="4" required><?= htmlspecialchars($record['message']) ?></textarea>
        </div>

        <!-- Attachment -->
        <div class="mb-3">
          <label class="form-label">Attach File</label>
          <input type="file" name="attachment" class="form-control">
          <?php if (!empty($record['attachment'])): ?>
            <small class="form-text">
              Leave blank to keep existing file:&nbsp;
              <a href="<?= htmlspecialchars($record['attachment']) ?>" target="_blank">View current</a>
            </small>
          <?php endif; ?>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Update Examination</button>
        <a href="examination.php" class="btn btn-secondary ms-2">Cancel</a>
      </form>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>


  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

  <!-- Optional Plugins -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/chart.js/chart.umd.js"></script>
  <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
  <script src="assets/js/dataTables.select.min.js"></script>

  <!-- Custom Scripts -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="assets/js/dashboard.js"></script>

  <script>
    const quill = new Quill('#editor', {
      theme: 'snow',
      modules: {
        toolbar: [
          ['bold', 'italic', 'underline'],
          ['link', 'image'],
          [{ 'list': 'ordered' }, { 'list': 'bullet' }]
        ]
      }
    });

    document.getElementById('mailForm').addEventListener('submit', function (event) {
      event.preventDefault();

      // Save message HTML
      document.getElementById('messageHtml').value = quill.root.innerHTML;

      const formData = new FormData(this);

      // OPTIONAL: send via AJAX
      // fetch('submit.php', {
      //   method: 'POST',
      //   body: formData
      // }).then(...);

      // For now: just console
      for (let [key, value] of formData.entries()) {
        console.log(key, value);
      }

      // Clear form
      this.reset();
      quill.root.innerHTML = '';
    });
  </script>
</body>
</html>
