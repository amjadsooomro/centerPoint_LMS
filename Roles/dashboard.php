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

    /* Table Styles */
    .table-responsive {
      font-size: 0.875rem; /* Smaller font size */
    }
    .table th, .table td {
      vertical-align: middle;
    }
    .table th {
      background-color: #f8f9fa;
    }
    .table td {
      background-color: #ffffff;
    }
    .table td a {
      color: #007bff;
      text-decoration: none;
    }
    .table td a:hover {
      text-decoration: underline;
    }
    .table td i {
      font-size: 1.2rem;
    }
    /* Responsive Design */
    @media (max-width: 768px) {
      .table-responsive {
        font-size: 0.75rem;
      }
      .table td {
        display: block;
        width: 100%;
        box-sizing: border-box;
      }
      .table td:before {
        content: attr(data-label);
        font-weight: bold;
        display: block;
        margin-bottom: 0.5rem;
      }
      .table td:last-child {
        border-bottom: 0;
      }
    }

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


  .table thead th {
    background-color: #4E6688;
    color: white; /* Optional: Ensures text is readable */
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

include_once '../Database/connect.php'; 
$dbObj = new Database();
$db = $dbObj->getConnection();

$statusMsg = '';
if (isset($_GET['status']) && $_GET['status'] === 'success') {
    $statusMsg = '<div class="alert alert-success">✔️ Status updated successfully.</div>';
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<!DOCTYPE html>

  <h3 class="mb-4">📝 Examination Records</h3>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Subject</th>
          <th>Semester</th>
          <th>Instructor</th>
          <th>Lab</th>
          <th>Date & Time</th>
          <th>Time Slot</th>
          <th>Message</th>
          <th>Link</th>
          <th>Attachment</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $stmt = $db->query("SELECT * FROM examination ORDER BY created_at DESC");
        $i = 1;
        while ($row = $stmt->fetch_assoc()):
        ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= htmlspecialchars($row['subject']) ?></td>
          <td><?= htmlspecialchars($row['semester']) ?></td>
          <td><?= htmlspecialchars($row['instructor']) ?></td>
          <td><?= htmlspecialchars($row['lab']) ?></td>
          <td><?= htmlspecialchars($row['date_time']) ?></td>
          <td><?= htmlspecialchars($row['time_slot']) ?></td>
          <td><?= htmlspecialchars($row['message']) ?></td>
          <td>
            <?php if (!empty($row['link_share'])): ?>
              <a href="<?= htmlspecialchars($row['link_share']) ?>" target="_blank">
                <i class="fa fa-link"></i>
              </a>
            <?php else: ?>
              —
            <?php endif; ?>
          </td>
          <td>
            <?php if (!empty($row['attachment'])): ?>
              <a href="<?= htmlspecialchars($row['attachment']) ?>" target="_blank">
                <i class="fa fa-paperclip"></i>
              </a>
            <?php else: ?>
              —
            <?php endif; ?>
          </td>
          <td>
            <?php if ($row['status'] == 1): ?>
              <span class="badge bg-success">Active</span>
            <?php else: ?>
              <span class="badge bg-danger">Inactive</span>
            <?php endif; ?>
          </td>
          <td>
            <!-- Show / Hide -->
            <?php if ($row['status'] == 1): ?>
              <a href="toggle_status.php?id=<?= $row['id'] ?>&status=0" class="btn btn-sm btn-warning mb-1">
                <i class="fa fa-eye-slash"></i> Hide
              </a>
            <?php else: ?>
              <a href="toggle_status.php?id=<?= $row['id'] ?>&status=1" class="btn btn-sm btn-success mb-1">
                <i class="fa fa-eye"></i> Show
              </a>
            <?php endif; ?>

            <!-- Edit -->
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary mb-1">
              <i class="fa fa-pencil"></i> Edit
            </a>

            <!-- Delete -->
            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Are you sure you want to delete this exam?');">
              <i class="fa fa-trash"></i> Delete
            </a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
