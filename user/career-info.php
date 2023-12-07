<?php 
session_start();

include("../connection.php");


    // Check if branch_loc is set in the URL
    if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

  // Fetch job records for displaying in separate cards
  $selectQuery = "SELECT job_id, branch_loc, date_pos, position, job_des1, job_des2, job_des3, job_img, branch_id, branch_name, location FROM job, branch where branch_loc = branch_id and job_id = $job_id";
  $result = mysqli_query($conn, $selectQuery);
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
  <link href="career-info.css" rel="stylesheet">

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

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
    <a class="navbar-brand" href="../index.php"><img src="../img/nmpc-logo.png" alt="" class="img-fluid">MSU-IIT NMPC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-2">
            <li class="nav-item">
          <a class="nav-link transition-link" aria-current="page" href="../index.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link transition-link" aria-current="page" href="#">Product & Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link transition-link" aria-current="page" href="#">Allied Businesses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link transition-link" aria-current="page" href="#">Membership</a>
        </li>
        <li class="nav-item">
          <a class="nav-link transition-link" aria-current="page" href="#">Branches</a>
        </li>

        <li class="nav-item" style="margin-right: 85px;">
          <a class="nav-link transition-link" aria-current="page" href="#">FAQs</a>
        </li>
        </div>
    </div>
</nav>
<br>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 style="margin-left:120px;">Career Information</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="career.php"> Back</a></li>
          <li class="breadcrumb-item active"> Career Information</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container-c mt-auto">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-mb-4">
                <div class="card">
                    <img src="<?php echo $row['job_img']; ?>" class="card-img-top" alt="Job Image">
                    <div class="card-body">
                        <h2 class="card-title"><i class="ri-newspaper-line"></i><?php echo " ", $row['position']; ?></h2>
                        <br>
                        <span><i class="ri-map-pin-5-line"></i><?php echo " ", $row['branch_name']; ?></span>
                        <br>
                        <span><i class="ri-map-pin-line"></i><?php echo " ", $row['location']; ?> </span> 
                        <br>
                        <span><i class="ri-map-pin-time-line"></i><?php echo " ", $row['date_pos']; ?></span>   <br><br>
                        <span><b>Job Description:</b></span>
                        <br><br>
                        <p><?php echo $row['job_des1']; ?></p>
                        <p><?php echo $row['job_des2']; ?> </p>
                        <p><?php echo $row['job_des3']; ?></p>
                        <br>
                        <a>Want to apply online? Click here → </a>
                        <span><a href="apply.php?job_id=<?php echo $row['job_id']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen"></i> Apply Online</a></span>
                        <br><br><br>
                        <p style="font-size: 14px;">NOTE: Applicants who are shortlisted will be scheduled for a qualifying exam and initial interview through e-mail/text.</p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<br>
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

</body>

</html>

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
</body>
</html>