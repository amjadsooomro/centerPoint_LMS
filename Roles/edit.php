<?php
// ┌────────────────────────────────────────────────┐
// │ WARNING: No blank lines or BOM before this!   │
// └────────────────────────────────────────────────┘

error_reporting(E_ALL);
ini_set('display_errors', '1');
ob_start(); // buffer all output to prevent premature headers

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/../Database/connect.php';

$id = $_GET['id'] ?? '';
if (!ctype_digit($id)) {
    die('Invalid request');
}
$id = (int)$id;

$exam = new Examination();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject    = trim($_POST['subject'] ?? '');
    $semester   = trim($_POST['semester'] ?? '');
    $instructor = trim($_POST['instructor'] ?? '');
    $lab        = trim($_POST['lab'] ?? '');
    $dtRaw      = trim($_POST['date'] ?? '');

    $date_time = preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/', $dtRaw)
        ? str_replace('T', ' ', $dtRaw) . ':00'
        : null;

    $time_slot  = trim($_POST['time'] ?? '');
    $message    = trim($_POST['messageHtml'] ?? '');
    $link_share = filter_var(trim($_POST['link_share'] ?? ''), FILTER_VALIDATE_URL) ?: null;

    if ($date_time === null) {
        die('Invalid date/time format.');
    }

    $record = $exam->fetchOne($id);
    if (!$record) {
        die('Record not found.');
    }

    // Handle file attachment if provided…
    $attachment = $record['attachment'] ?? null;
    if (!empty($_FILES['attachment']['name']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
        $orig = $_FILES['attachment']['name'];
        $ext  = strtolower(pathinfo($orig, PATHINFO_EXTENSION));
        $base = preg_replace('/[^A-Za-z0-9_-]/', '_', pathinfo($orig, PATHINFO_FILENAME));
        $fn   = date('YmdHis') . "_{$base}." . $ext;

        $uploadDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
            die('Cannot create uploads directory');
        }

        $target = $uploadDir . $fn;
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $target)) {
            $attachment = 'uploads/' . $fn;
        }
    }

    $ok = $exam->update(
        $id,
        $subject,
        $semester,
        $instructor,
        $lab,
        $date_time,
        $time_slot,
        $message,
        $link_share
    );

    if ($ok) {
        header('Location: dashboard.php?status=success');
        exit;
    } else {
        echo '<div class="alert alert-danger">Failed to update record.</div>';
        exit;
    }
}

// Show form
$record = $exam->fetchOne($id);
if (!$record) {
    die('Record not found.');
}

$date_formatted = date('Y-m-d\TH:i', strtotime($record['date_time']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Examination</title>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <!-- Bootstrap & Quill -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="assets/js/select.dataTables.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/images/favicon.png">
  <style>
    #editor { height: 200px; background-color: #fff; }
    .nav .nav-item .nav-link.active { background-color: #0d6efd; color: #fff; }
    .menu-teitl { background-color: #71797E; }
    #one { background-color: slategray; }
  </style>
</head>
<body>

<?php require_once 'header.php'; ?>
<div class="container-fluid page-body-wrapper">
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
    
  <div class="container my-5">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white">
        <h5>Edit Examination</h5>
      </div>
      <div class="card-body p-4">
        <form enctype="multipart/form-data" method="POST">
          <input type="hidden" name="messageHtml" id="messageHtml">

          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Subject</label>
              <input type="text" name="subject" class="form-control" required
                     value="<?= htmlspecialchars($record['subject'], ENT_QUOTES) ?>">
            </div>
            <div class="col-md-6 mb-3">
              <label>Semester</label>
              <input type="text" name="semester" class="form-control" required
                     value="<?= htmlspecialchars($record['semester'], ENT_QUOTES) ?>">
            </div>
            <div class="col-md-6 mb-3">
              <label>Instructor</label>
              <input type="text" name="instructor" class="form-control" required
                     value="<?= htmlspecialchars($record['instructor'], ENT_QUOTES) ?>">
            </div>
            <div class="col-md-6 mb-3">
              <label>Lab</label>
              <input type="text" name="lab" class="form-control" required
                     value="<?= htmlspecialchars($record['lab'], ENT_QUOTES) ?>">
            </div>
            <div class="col-md-6 mb-3">
              <label>Date &amp; Time</label>
              <input type="datetime-local" name="date" class="form-control" required
                     value="<?= $date_formatted ?>">
            </div>
            <div class="col-md-6 mb-3">
              <label>Time Slot</label>
              <input type="text" name="time" class="form-control" required
                     value="<?= htmlspecialchars($record['time_slot'], ENT_QUOTES) ?>">
            </div>
            <div class="col-md-12 mb-3">
              <label>Shareable Link</label>
              <input type="url" name="link_share" class="form-control"
                     value="<?= htmlspecialchars($record['link_share'], ENT_QUOTES) ?>">
            </div>
          </div>

          <div class="mb-3">
            <label>Message</label>
            <<!-- Hidden textarea for backend submission -->
<textarea name="messageHtml" id="messageHtml" style="display:none;">
<?= htmlspecialchars($record['message'], ENT_QUOTES) ?>
</textarea>

<!-- Quill editor -->
<div id="editor" style="background:#fff; min-height:200px;"></div>

          </div>

          <div class="mb-3">
            <label>Attach File</label>
            <input type="file" name="attachment" class="form-control">
            <?php if (!empty($record['attachment'])): ?>
              <small class="form-text">Leave blank to keep current file:
                <a href="<?= htmlspecialchars($record['attachment'], ENT_QUOTES) ?>" target="_blank">View</a>
              </small>
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update Examination</button>
            <a href="dashboard.php" class="btn btn-secondary ms-2">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Include Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const textarea = document.getElementById('messageHtml');
    const editorDiv = document.getElementById('editor');

    const quill = new Quill(editorDiv, {
      theme: 'snow',
      modules: {
        toolbar: [
          ['bold', 'italic', 'underline'],
          ['link', 'image'],
          [{ list: 'ordered' }, { list: 'bullet' }]
        ]
      }
    });

    // Set editor content from textarea
    quill.root.innerHTML = textarea.value.trim();

    // Update textarea whenever content changes
    quill.on('text-change', () => {
      textarea.value = quill.root.innerHTML;
    });

    // Ensure it's updated on form submit too
    editorDiv.closest('form').addEventListener('submit', () => {
      textarea.value = quill.root.innerHTML;
    });
  });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<!-- Optional JS files… -->
</body>
</html>
<?php
// Flush buffer if ob_start() was called
if (ob_get_level()) {
    ob_end_flush();
}
