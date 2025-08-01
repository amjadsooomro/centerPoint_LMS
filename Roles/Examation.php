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

<body>

  <!-- Header and Sidebar -->
  <?php include("header.php"); ?>





  <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="labs.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Examation.php">
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



<!-- Main Container -->
<div class="container mt-5">
 
  <div class="card shadow-sm ">
    <!-- Top Bar -->
    <div class="card-header  border-bottom" id="one">
      <h5 class="mb-0 text-white">Mailing Examination Form</h5>
    </div>

    <div class="card-body p-4">
      <form id="mailForm" enctype="multipart/form-data">
        <div class="row">
          <!-- Subject -->
          <div class="col-md-6 mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" required>
          </div>

          <!-- Semester -->
          <div class="col-md-6 mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="text" class="form-control" id="semester" name="semester" placeholder="Enter semester" required>
          </div>

          <!-- Instructor -->
          <div class="col-md-6 mb-3">
            <label for="instructor" class="form-label">Instructor</label>
            <input type="text" class="form-control" id="instructor" name="instructor" placeholder="Enter instructor" required>
          </div>

          <!-- Lab -->
          <div class="col-md-6 mb-3">
            <label for="lab" class="form-label">Lab</label>
            <input type="text" class="form-control" id="lab" name="lab" placeholder="Enter lab" required>
          </div>

          <!-- Date and Time -->
          <div class="col-md-6 mb-3">
            <label for="date" class="form-label">Date & Time</label>
            <input type="datetime-local" class="form-control" id="date" name="date" required>
          </div>

          <!-- Time Slot -->
          <div class="col-md-6 mb-3">
            <label for="time" class="form-label">Time Slot</label>
            <input type="text" class="form-control" id="time" name="time" placeholder="Enter time slot" required>
          </div>
        </div>

        <!-- Message -->
        <div class="mb-3">
          <label class="form-label">Message</label>
          <div id="editor"></div>
          <input type="hidden" name="messageHtml" id="messageHtml">
        </div>

        <!-- Attachment -->
        <div class="mb-3">
          <label for="attachment" class="form-label">Attach File</label>
          <input type="file" class="form-control" id="attachment" name="attachment">
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Send</button>
      </form>
    </div>
  </div>
</div>

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
