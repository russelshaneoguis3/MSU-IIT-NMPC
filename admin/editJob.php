<?php 

session_start();

include("../connection.php");

if (isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] === 'administrator') { 

    if (isset($_GET['job_id'])) {
        $job_id = $_GET['job_id'];

        $selectQuery = "SELECT job_id, branch_loc, date_pos, position, job_des1, job_des2, job_des3, job_img, branch_id, branch_name, location FROM job, branch where branch_loc = branch_id and job_id = $job_id";
        $result1 = mysqli_query($conn, $selectQuery);

                // Fetch job information based on job_id
                $query = "SELECT job_img FROM job WHERE job_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $job_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
        
                // Check if the job exists
                if (!$row) {
                    // Handle the case where the job doesn't exist
                    echo 'Job not found.';
                    exit(); // Add exit to stop execution if the job is not found
                }
    
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve values from the form
            $position = $_POST['position'];
            $job_des1 = $_POST['job_des1'];
            $job_des2 = $_POST['job_des2'];
            $job_des3 = $_POST['job_des3'];
    
            // Check if a new image is uploaded
            if (!empty($_FILES['job_img']['name'])) {
                // Handle image upload and type validation
                $allowedExtensions = ['jpg', 'jpeg', 'png'];
                $uploadDir = "../img/uploads/";
                $uploadFile = $uploadDir . basename($_FILES['job_img']['name']);
                $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
              
                if (in_array($imageFileType, $allowedExtensions)) {

                  // Delete the old image if it exists
                  if (!empty($row['job_img'])) {
                    unlink($row['job_img']);
                }

                    if (move_uploaded_file($_FILES['job_img']['tmp_name'], $uploadFile)) {
                        // Image upload successful, update the database with the complete path
                        $completeImagePath = $uploadDir . $_FILES['job_img']['name'];
                        $sql = "UPDATE job SET position = '$position', job_des1 = '$job_des1', job_des2 = '$job_des2', job_des3 = '$job_des3', job_img = '$completeImagePath' WHERE job_id = $job_id";
                    } else {
                        // Image upload failed, update the database without changing the image
                        $sql = "UPDATE job SET position = '$position', job_des1 = '$job_des1', job_des2 = '$job_des2', job_des3 = '$job_des3' WHERE job_id = $job_id";
                    }
                } else {
                    // Invalid file type, handle it as needed (you can show an error message or redirect)
                    // Handle invalid file type with SweetAlert
                        $_SESSION['editJobError'] = true;
                        header("Location: editJob.php?job_id=$job_id");
                        exit();
                }
            } else {
                // No new image uploaded, update the database without changing the image
                $sql = "UPDATE job SET position = '$position', job_des1 = '$job_des1', job_des2 = '$job_des2', job_des3 = '$job_des3' WHERE job_id = $job_id";
            }
    
            // Execute the SQL query
            if ($conn->query($sql) === TRUE) {
                $_SESSION['editJobSuccess'] = true;
            } else {
                echo "Error updating record: " . $conn->error;
            }
    
        }
    
    }

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <meta content="Author" name="MSU-IIT Coop">
  <meta content="Keywords" name="MSU-IIT Coop, ,msuiit coop, msuiit cooperative, MSU-IIT Multi-purpose Cooperative, Cooperative in the Philippines, mindanao cooperative, philippine cooperative, coop natcco, coop" />
  <meta name="Description" content="MSU-IIT Coop, a leading, world-class cooperative serving the nation." />
  <title>MSU-IIT National Multi-Purpose Cooperative &raquo; Home</title>

  
  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <!-- Font Awesome Icon -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

   <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="style.css" rel="stylesheet">

    <!-- Style/CSS -->
    <link rel="stylesheet" type="text/css" href="../transition.css">

   <!-- Favicons -->
   <link href="../img/coop-logo.png" rel="icon">
   <link href="../img/coop-logo.png" rel="apple-touch-icon">

   <!-- Your custom scripts / tranition-->
   <script src="../transition.js"></script>
    
</head>
<body>

<!-- page transition -->
<div id="transition-overlay">
    <img src="../img/transition.jpg" alt="Loading Image">
</div>


<!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="admin-dashboard.php" class="logo d-flex align-items-center">
        <img src="../img/coop-logo.png" alt="">
        <span class="d-none d-lg-block">MSU-IIT NMPC</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">
        <?php
        // Execute SQL query to count applicants
            $countQuery = "SELECT COUNT(*) as appCount FROM job_applicants";
            $countResult = $conn->query($countQuery);
            // Fetch the result as an associative array
            $countData = $countResult->fetch_assoc();
            // Get the count from the array
            $applicantCount = $countData['appCount'];
        ?>
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number"><?php echo $applicantCount ?></span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
            You have <?php echo $applicantCount ?> online applicants!
              <a href="applicants.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <?php
                        // Execute SQL query to retrieve information
          $query5 = "SELECT ja.applicant_id, ja.address, ja.job_applied, ja.app_name, ja.contact_no, ja.email, j.position, ja.degree, ja.app_letter, ja.app_resume, ja.other,
          CONCAT(b.branch_name, '<br>', ' ', b.location) as loc,
                ja.app_date
                FROM job_applicants ja
                INNER JOIN job j ON ja.job_applied = j.job_id
                INNER JOIN branch b ON j.branch_loc = b.branch_id Limit 5";
      
              $result5 = $conn->query($query5);
            ?>

              <?php while ($row = $result5->fetch_assoc()) { ?>

              <li class="notification-item">
              <i class="bi bi-info-circle text-success"></i>
              <a href ="applicants-info.php?applicant_id=<?php echo $row['applicant_id']; ?>"> 

              <div>
                <h4><?php echo $row['position']; ?></h4>
                <p><?php echo $row['app_name']; ?></p>
                <p><?php echo $row['app_date']; ?></p>
              </div>
              </a>
              </li>

              <?php } ?> 
              </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <i class="fa-solid fa-user-large"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name']; ?></span>
          </a>
          <!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['name']; ?></h6>
              <span><?php echo $_SESSION['role']; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center transition-link" href="../user/logout.php">
                <i class="bi bi-box-arrow-right transition-link"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="admin-dashboard.php">
          <i class="bx bxs-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="ri-service-fill"></i>
          <span>Products & Services</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bx bxs-business"></i>
          <span>Allied Businesses</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="ri-contacts-line"></i>
          <span>Membership</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="branches.php">
          <i class="bx bxs-map"></i>
          <span>Branches</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="career.php">
          <i class="ri-briefcase-fill"></i>
          <span>Careers</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bx bx-question-mark"></i>
          <span>FAQs</span>
        </a>
      </li>
    

    
  </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

  <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
  <div class="pagetitle">
      <h1>Edit Career Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="career-list.php?branch_id=<?php echo $row['branch_id']; ?>">Back</a></li>
          <li class="breadcrumb-item active">Careers Edit</li>
        </ol>
      </nav>

<div class="container">
    <h2>Edit Job Form</h2>
    <?php
    // Check if job_id is provided in the URL
    if (isset($_GET['job_id'])) {
        $job_id = $_GET['job_id'];

        // Fetch job information based on job_id
        $query = "SELECT * FROM job WHERE job_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $job_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Check if the job exists
        if ($row) {
            ?>
            <form action="editJob.php?job_id=<?php echo $job_id; ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3" style="width: 50%">
                    <label for="position"><b>Position</b></label>
                    <input type="text" class="form-control" id="position" name="position" value="<?php echo $row['position']; ?>" required>
                </div>
                <div class="mb-3" style="width: 50%">
                    <label for="job_des1"><b>First Description</b></label>
                    <input type="text" class="form-control" id="job_des1" name="job_des1" value="<?php echo $row['job_des1']; ?>" required>
                </div>
                <div class="mb-3" style="width: 50%">
                    <label for="job_des2"><b>Second Description</b></label>
                    <input type="text" class="form-control" id="job_des2" name="job_des2" value="<?php echo $row['job_des2']; ?>" required>
                </div>
                <div class="mb-3" style="width: 50%">
                    <label for="job_des3"><b>Third Description</b></label>
                    <input type="text" class="form-control" id="job_des3" name="job_des3" value="<?php echo $row['job_des3']; ?>" required>
                </div>
                <div class="mb-3" style="width: 50%">
                    <label for="job_img"><b>Job Image</b> (jpg, jpeg, and png are allowed)</label>
                    <input type="file" class="form-control" id="job_img" name="job_img" accept="image/*">
                </div>
                <button type="submit" class="btn btn-success">Save Changes</button>
            </form>
            <?php
        } else {
            // Handle the case where the job doesn't exist
            echo 'Job not found.';
        }

        // Close the statement
        $stmt->close();
    } 
    ?>
</div>
<?php } ?>
</main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>


<!--Container Main end-->

<!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-12 col-md-12 footer-links">
        <h4>MSU-IIT NATIONAL MULTI-PURPOSE COOPERATIVE</h4>
        <ul>
        <p><span>Head Office:</span>  Gregorio T. Lluch Sr. Ave., Pala-o Iligan City, 9200, Philippines</p>
        <p><span>Phone:</span> (063) 223-5874</p>
        <p><span>Email:</span> <a href="mailto:msuiitnmpc@msuiitcoop.org?subject=Contact%20from%20MSU-IIT%20Coop%20website">msuiitnmpc@msuiitcoop.org</a></p>
        <p><a href="https://hpqs-vnzw.accessdomain.com/webmail/" target="_blank">Webmail</a>, <a href="http://119.93.53.245/hrmax">HR Max</a>, <a target="_blank" href="https://docs.google.com/forms/d/1ZuszRLiLPY_-UroOgkmjZXs0sNpIVZPGJDuhxBmekwk/viewform">IT support desk</a>, <a href="https://sites.google.com/view/msuiitnmpcesurvey/home">e-Survey</a></p>
        </ul>
      </div>

    </div>
  </div>
</div>

<div class="container">
  </div>
  <div class="credits">
    Designed by <a  href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
  </div>
</div>
</footer>
<!-- End Footer -->

<script>
    // Function to redirect after success and show SweetAlert with delay
// Function to redirect after success and show SweetAlert with delay
function redirectAfterSuccess() {
    Swal.fire({
        icon: 'success',
        title: 'Job Edited Successfully!',
        html: '<p>The job details have been updated successfully.</p>',
        timer: 2000, // Display message for 3 seconds
        showConfirmButton: false,
        didClose: () => {
            window.location.href = 'career.php';
        }
    });
}

        // Function to show SweetAlert for invalid file type
    function showInvalidFileTypeAlert() {
    Swal.fire({
        icon: 'error',
        title: 'Invalid File Type',
        text: 'Only JPG, JPEG, and PNG files are allowed.'
    }).then(function () {
        
        window.location.href = 'editJob.php?job_id=<?php echo $job_id; ?>';
        exit();
    });
}
    // Check if the addJobSuccess session variable is set, then show the SweetAlert
    $(document).ready(function () {
        <?php
        if (isset($_SESSION['editJobSuccess']) && $_SESSION['editJobSuccess']) {
            echo "redirectAfterSuccess();";
            unset($_SESSION['editJobSuccess']); // Clear the session variable
        }

        if (isset($_SESSION['editJobError']) && $_SESSION['editJobError']) {
          echo "showInvalidFileTypeAlert();";
          unset($_SESSION['editJobError']); // Clear the session variable
        }
        ?>
    });
</script>



</body>


<?php 
} else {
     header("Location: ../user/login.php");
     exit();
}
?>

</html>
