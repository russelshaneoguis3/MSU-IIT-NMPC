<?php 
session_start();

include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    // Fetch job records for displaying in separate cards
    $selectQuery = "SELECT job_id, branch_loc, date_pos, position, job_des1, job_des2, job_des3, job_img, branch_id, branch_name, location FROM job, branch where branch_loc = branch_id and job_id = $job_id";
    $result = mysqli_query($conn, $selectQuery);

}
  // Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_id = $_POST['job_id'];
    $app_name = $_POST['app_name'];
    $address = $_POST['address'];
    $degree = $_POST['degree'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];

    // File upload handling
    $uploadDirectory = "../files/"; // Specify the directory where you want to store uploaded files

    $appLetterFileName = $uploadDirectory . basename($_FILES['app_letter']['name']);
    $appResumeFileName = $uploadDirectory . basename($_FILES['app_resume']['name']);
    $otherFileName = $uploadDirectory . basename($_FILES['other']['name']);

    // Move uploaded files to the specified directory
    move_uploaded_file($_FILES['app_letter']['tmp_name'], $appLetterFileName);
    move_uploaded_file($_FILES['app_resume']['tmp_name'], $appResumeFileName);
    move_uploaded_file($_FILES['other']['tmp_name'], $otherFileName);

    // Insert data into the database
 // Insert data into the database
    $insertQuery = "INSERT INTO job_applicants (job_applied, app_name, address, degree, contact_no, email, app_letter, app_resume, other) VALUES ('$job_id', '$app_name', '$address', '$degree', '$contact_no', '$email', '$appLetterFileName', '$appResumeFileName', '$otherFileName')";
    $resultInsert = mysqli_query($conn, $insertQuery);

  // check if the query was successful
    if($resultInsert) {
    // Display JavaScript alert
    echo '<script>';
    echo 'alert("Please wait for 3 days. The company will call/text you for more information about your application.");';
    echo 'window.location.href = "career.php";';
    echo '</script>';
  } else {
    // display error message
    echo "Insert failed: " . mysqli_error($conn);
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

  <!-- Add this script to include Alertify.js -->
  <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>

  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

    <div class="pagetitle">
      <h1 style="margin-left:120px;">Job Online Application</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="career-info.php?job_id=<?php echo $row['job_id']; ?>"> Back</a></li>
          <li class="breadcrumb-item active"> Online Application</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <br>

    <h5 style ="margin-left: 115px;"><?php echo "Applying for ","<b>", $row['position'], "</b>"," Position at ", $row['branch_name']; ?></h5><br>

    <div class="container mt-3">
        <div class="row">
            <!-- Left Column - Forms on the Left -->
            <div class="col-md-6">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <!-- Job-ID-->
                    <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">

                    <div class="mb-3">
                        <label for="app_name" class="form-label"><b>Applicant's Name</b></label>
                        <input type="text" class="form-control" id="app_name" name="app_name" placeholder="Input Full Name" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label"><b>Address</b></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Input Full Address" required>
                    </div>
                    <div class="mb-3">
                        <label for="degree" class="form-label"><b>Academic Degree</b></label>
                        <input type="text" class="form-control" id="degree" name="degree" placeholder="Input (Course/Program/Degree) Graduated" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="contact_no" class="form-label"><b>Contact Number</b></label>
                        <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Input Contact Number" required>
                    </div>
               
            </div>

            <!-- Right Column - Forms on the Right -->
            <div class="col-md-6">
            <div class="mb-3">
                        <label for="email" class="form-label"><b>Email Address</b></label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Input email address (e.g. JuanDelaCruz@gmail.com)" required>
                    </div>

                    <div class="mb-3">
                    <label for="app_letter" class="form-label"><b>Application Letter</b> (PDF files only)</label>
                    <input type="file" class="form-control" id="app_letter" name="app_letter" accept=".pdf" required>
                    </div>

                    <div class="mb-3">
                    <label for="app_resume" class="form-label"><b>Resume/curriculum vitae CV</b> (PDF only)</label>
                    <input type="file" class="form-control" id="app_resume" name="app_resume" accept=".pdf" required>
                    </div>

                    <div class="mb-3">
                    <label for="other" class="form-label"><b>Other Files</b> (i.e., Accomplishments, Certificates, and etc. - PDF only)</label>
                    <input type="file" class="form-control" id="other" name="other" accept=".pdf">
                    </div>

            </div>
        </div>
        <button type="submit" class="btn btn-success">Apply Job</button>
    </div>
    
</form>

<br>
</main><!-- End #main -->
<?php } ?>

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
<script>

    $(document).ready(function() {
        swal({
            title: "Online Application",
            text: "After you submit your online application, wait for 3 days the Company will text/call you for more information",
            button: "Ok",
            timer: 5000
        });
    });
</script>

</body>
</html>