<?php
// Enable error display
ini_set('display_errors', 1);
error_reporting(E_ALL);

// DB Connection
include_once '../Database/connect.php';
include_once 'functions.php';
$dbObj = new Database();
$db = $dbObj->getConnection();

// Status message from URL (optional)
$statusMsg = '';
if (isset($_GET['status']) && $_GET['status'] === 'success') {
    $statusMsg = '<div class="alert alert-success">✔️ Status updated successfully.</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mailing Examination</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

  <style>
    .table-responsive {
      font-size: 0.875rem;
    }
    .table th, .table td {
      vertical-align: middle;
    }
    .table thead th {
      background-color: #4E6688 !important;
      color: white !important;
    }
    .message-cell {
      max-width: 200px;
      white-space: nowrap;
      overflow-x: auto;
      display: block;
      position: relative;
    }
    .copy-btn {
      border: none;
      background: none;
      color: #0d6efd;
      cursor: pointer;
      margin-left: 5px;
    }
  </style>
</head>
<body class="bg-light">

<?php include("header.php"); ?>

<div class="container-fluid page-body-wrapper">
  <!-- Sidebar -->
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
          <span class="menu-title">Examination</span>
        </a>
      </li>
      <!-- More menu items -->
    </ul>
  </nav>

  <!-- Main Panel -->
  <div class="main-panel p-4 w-100">
    <?= $statusMsg ?>
    <h3 class="mb-4">📝 Examination Records</h3>

    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead>
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
            <td class="message-cell">
              <?= htmlspecialchars($row['message']) ?>
              <button class="copy-btn" onclick="copyText('<?= htmlspecialchars(addslashes($row['message'])) ?>')">
                <i class="fa fa-copy"></i>
              </button>
            </td>
            <td>
              <?= !empty($row['link_share']) ? '<a href="'.htmlspecialchars($row['link_share']).'" target="_blank"><i class="fa fa-link"></i></a>' : '—' ?>
            </td>
            <td>
              <?= !empty($row['attachment']) ? '<a href="'.htmlspecialchars($row['attachment']).'" target="_blank"><i class="fa fa-paperclip"></i></a>' : '—' ?>
            </td>
            <td>
              <span class="badge <?= strtolower($row['status']) === 'active' ? 'bg-success' : 'bg-danger' ?>">
                <?= ucfirst($row['status']) ?>
              </span>
              <br>
              <select class="form-select form-select-sm status-dropdown mt-1" data-id="<?= $row['id'] ?>">
                <option value="active" <?= strtolower($row['status']) === 'active' ? 'selected' : '' ?>>Active</option>
                <option value="inactive" <?= strtolower($row['status']) === 'inactive' ? 'selected' : '' ?>>Inactive</option>
              </select>
            </td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary mb-1">
                <i class="fa fa-pencil"></i> Edit
              </a>
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
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Copy message text to clipboard function
  function copyText(text) {
    navigator.clipboard.writeText(text).then(() => {
      alert("Message copied to clipboard!");
    });
  }

  // Handle status dropdown change with AJAX
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.status-dropdown').forEach(select => {
      select.addEventListener('change', () => {
        const id = select.getAttribute('data-id');
        const status = select.value;

        fetch('toggle_status.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: `id=${encodeURIComponent(id)}&status=${encodeURIComponent(status)}`
        })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            alert(`Status changed to ${status.charAt(0).toUpperCase() + status.slice(1)}`);
            location.reload();
          } else {
            alert('Failed to update status');
          }
        })
        .catch(err => {
          alert('Error updating status');
          console.error(err);
        });
      });
    });
  });
</script>

</body>
</html>
