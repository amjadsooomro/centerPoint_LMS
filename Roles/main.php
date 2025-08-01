<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
  <!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome xam Department</h3>
            
            <!-- Slideshow Carousel added here -->
            <div id="labCarousel" class="carousel slide mt-4" data-bs-ride="carousel" style="max-width: 600px;">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#labCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#labCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#labCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner rounded">
                <div class="carousel-item active">
                  <img src="assets/images/lab1.jpg" class="d-block w-100" alt="Lab 1" />
                  <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                    <h5>Lab 1</h5>
                    <p>Description of Lab 1</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="assets/images/lab2.jpg" class="d-block w-100" alt="Lab 2" />
                  <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                    <h5>Lab 2</h5>
                    <p>Description of Lab 2</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="assets/images/lab3.jpg" class="d-block w-100" alt="Lab 3" />
                  <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                    <h5>Lab 3</h5>
                    <p>Description of Lab 3</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#labCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#labCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>

          </div>
          <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="mdi mdi-calendar"></i> Today (10 Jan 2021) </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <a class="dropdown-item" href="#">January - March</a>
                  <a class="dropdown-item" href="#">March - June</a>
                  <a class="dropdown-item" href="#">June - August</a>
                  <a class="dropdown-item" href="#">August - November</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Rest of your dashboard content -->

    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="assets/images/dashboard/people.svg" alt="people" />
            <div class="weather-info">
              <div class="d-flex">
                <div>
                  <h2 class="mb-0 font-weight-normal"><i class="icon-sun me-2"></i>31<sup>C</sup></h2>
                </div>
                <div class="ms-2">
                  <h4 class="location font-weight-normal">Chicago</h4>
                  <h6 class="font-weight-normal">Illinois</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Today’s Bookings</p>
                <p class="fs-30 mb-2">4006</p>
                <p>10.00% (30 days)</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Total Bookings</p>
                <p class="fs-30 mb-2">61344</p>
                <p>22.00% (30 days)</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Number of Meetings</p>
                <p class="fs-30 mb-2">34040</p>
                <p>2.00% (30 days)</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Number of Clients</p>
                <p class="fs-30 mb-2">47033</p>
                <p>0.22% (30 days)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <p class="card-title">Sales Report</p>
              <a href="#" class="text-info">View all</a>
            </div>
            <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
            <div id="sales-chart-legend" class="chartjs-legend mt-4 mb-2"></div>
            <canvas id="sales-chart"></canvas>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
          <div class="card-body">
            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-bs-ride="carousel">
              <div class="carousel-inner">
                <!-- Carousel items here (as in your original code) -->
                <div class="carousel-item active">
                  <div class="row">
                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                      <div class="ml-xl-4 mt-3">
                        <p class="card-title">Detailed Reports</p>
                        <h1 class="text-primary">$34040</h1>
                        <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                        <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                      </div>
                    </div>
                    <div class="col-md-12 col-xl-9">
                      <div class="row">
                        <div class="col-md-6 border-right">
                          <div class="table-responsive mb-3 mb-md-0 mt-3">
                            <table class="table table-borderless report-table">
                              <tr>
                                <td class="text-muted">Illinois</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td>
                                  <h5 class="font-weight-bold mb-0">713</h5>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-muted">Washington</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td>
                                  <h5 class="font-weight-bold mb-0">583</h5>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-muted">Mississippi</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td>
                                  <h5 class="font-weight-bold mb-0">924</h5>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-muted">California</td>
                                <td class="w-100 px-0">
                                  <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                                <td>
                                  <h5 class="font-weight-bold mb-0">664</h5>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <div class="col-md-6 mt-3">
                          <canvas id="north-america-chart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Additional carousel items ... (keep as in your original code) -->
                
              </div>
              <a class="carousel-control-prev" href="#detailedReports" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#detailedReports" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Projects</p>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Assignee</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Last Update</th>
                    <th>Tracking ID</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>John Doe</td>
                    <td>Dashboard Redesign</td>
                    <td><label class="badge badge-gradient-success">Completed</label></td>
                    <td>15 Minutes ago</td>
                    <td>#WD-12345</td>
                  </tr>
                  <tr>
                    <td>Jane Smith</td>
                    <td>Server Migration</td>
                    <td><label class="badge badge-gradient-warning">Pending</label></td>
                    <td>1 Hour ago</td>
                    <td>#WD-12346</td>
                  </tr>
                  <tr>
                    <td>Bob Johnson</td>
                    <td>Bug Fixes</td>
                    <td><label class="badge badge-gradient-danger">Rejected</label></td>
                    <td>2 Days ago</td>
                    <td>#WD-12347</td>
                  </tr>
                  <tr>
                    <td>Alice Williams</td>
                    <td>New Feature</td>
                    <td><label class="badge badge-gradient-success">Completed</label></td>
                    <td>5 Days ago</td>
                    <td>#WD-12348</td>
                  </tr>
                  <tr>
                    <td>Michael Brown</td>
                    <td>Database Optimization</td>
                    <td><label class="badge badge-gradient-warning">Pending</label></td>
                    <td>1 Week ago</td>
                    <td>#WD-12349</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Messages</p>
            <div class="list-wrapper pt-2">
              <ul class="d-flex flex-column-reverse">
                <li>
                  <div class="profile-image">
                    <img src="assets/images/faces/face4.jpg" alt="profile" />
                  </div>
                  <div class="content">
                    <p class="mb-0">Mark sent you a message</p>
                    <small class="text-muted">15 Minutes ago</small>
                  </div>
                </li>
                <li>
                  <div class="profile-image">
                    <img src="assets/images/faces/face2.jpg" alt="profile" />
                  </div>
                  <div class="content">
                    <p class="mb-0">Cregh sent you a message</p>
                    <small class="text-muted">1 Hour ago</small>
                  </div>
                </li>
                <li>
                  <div class="profile-image">
                    <img src="assets/images/faces/face3.jpg" alt="profile" />
                  </div>
                  <div class="content">
                    <p class="mb-0">Profile picture updated</p>
                    <small class="text-muted">2 Days ago</small>
                  </div>
                </li>
                <li>
                  <div class="profile-image">
                    <img src="assets/images/faces/face4.jpg" alt="profile" />
                  </div>
                  <div class="content">
                    <p class="mb-0">New user added</p>
                    <small class="text-muted">5 Days ago</small>
                  </div>
                </li>
                <li>
                  <div class="profile-image">
                    <img src="assets/images/faces/face2.jpg" alt="profile" />
                  </div>
                  <div class="content">
                    <p class="mb-0">Team meeting</p>
                    <small class="text-muted">1 Week ago</small>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- content-wrapper ends -->
</div>


    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    <script src="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
    <script src="assets/js/dataTables.select.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/dashboard.js"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
  </body>
</html>