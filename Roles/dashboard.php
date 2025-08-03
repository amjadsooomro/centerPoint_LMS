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
</head>


<body class="bg-light">

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
// examination.php
ini_set('display_errors', 1);
error_reporting(E_ALL);


include_once '..\Database\connect.php'; 
$dbObj = new Database();
$db = $dbObj->getConnection();

$stmt = $db->query("
    SELECT * FROM examination ORDER BY created_at DESC
");

$statusMsg = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        $statusMsg = '<div class="alert alert-success">✔️ Examination submitted successfully.</div>';
    }
}
?>

<div class="container my-5">
    <?= $statusMsg ?>

    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Subject</th>
          <th>Semester</th>
          <th>Instructor</th>
          <th>Lab</th>
          <th>Date & Time</th>
          <th>Time Slot</th>
          <th>Link</th>
          <th>Attachment</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; while ($row = $stmt->fetch_assoc()): ?>
          <tr class="<?= $row['status'] ? '' : 'table-secondary' ?>">
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($row['subject']) ?></td>
            <td><?= htmlspecialchars($row['semester']) ?></td>
            <td><?= htmlspecialchars($row['instructor']) ?></td>
            <td><?= htmlspecialchars($row['lab']) ?></td>
            <td><?= htmlspecialchars($row['date_time']) ?></td>
            <td><?= htmlspecialchars($row['time_slot']) ?></td>
            <td>
              <?= $row['link_share'] 
                    ? '<a href="'.htmlspecialchars($row['link_share']).'" target="_blank">[/]</a>' 
                    : '—' ?>
            </td>
            <td>
              <?= $row['attachment']
                    ? '<a href="'.htmlspecialchars($row['attachment']).'" target="_blank">📎</a>'
                    : '—' ?>
            </td>
            <td>
              <?php if ($row['status']): ?>
                  <a href="toggle_status.php?id=<?= $row['id'] ?>&status=0"
                     class="btn btn-sm btn-success">Show</a>
              <?php else: ?>
                  <a href="toggle_status.php?id=<?= $row['id'] ?>&status=1"
                     class="btn btn-sm btn-secondary">Hide</a>
              <?php endif ?>
            </td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="delete.php?id=<?= $row['id'] ?>"
                 onclick="return confirm('Delete this exam record?');"
                 class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>

        <?php if ($stmt->num_rows === 0): ?>
          <tr><td colspan="11" class="text-center">No records</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
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
