<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] === 'administrator') {
?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8">
  <meta content="Author" name="MSU-IIT Coop">
  <meta content="Keywords" name="MSU-IIT Coop, ,msuiit coop, msuiit cooperative, MSU-IIT Multi-purpose Cooperative, Cooperative in the Philippines, mindanao cooperative, philippine cooperative, coop natcco, coop" />
  <meta name="Description" content="MSU-IIT Coop, a leading, world-class cooperative serving the nation." />
  <title>MSU-IIT National Multi-Purpose Cooperative &raquo; Home</title>

  <!-- Style/CSS -->
  <link rel="stylesheet" type="text/css" href="../transition.css">
    <!-- Style/CSS -->
    <link rel="stylesheet" type="text/css" href="admin-dashboard.css">

  <!-- FOnt style  -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap">

  <!-- Bootstrap Style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

   <!-- Font Awesome Icon -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

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

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand"><img src="../img/coop-logo.png" alt="" class="img-fluid"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-2">
        <!-- Dropdown magamit puhon -->

         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-user-large">&nbsp</i><?php echo $_SESSION['name']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item transition-link" href="../user/logout.php">Logout</a></li>

          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

</header>

<!-- Main body -->

<!-- sidebar -->

  <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu" checked>
  <label for="openSidebarMenu" class="sidebarIconToggle" >
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
  </label>

  <div id="sidebarMenu">
    <ul class="sidebarMenuInner">
    <li><a href="">Home</a></li>
    <li><a href="">Product & Services</a></li>
      <li><a href="">Allied Business</a></li>
      <li><a href="">Membership</a></li>
      <li><a class="transition-link" href="branches.php">Branches</a></li>
      <li><a href="">Careers</a></li>
      <li><a href="">FAQs</a></li>
    </ul>
  </div>

  <center>

<div class="dashboard-card card bg-light text-black">
<center><img class="card-img" src="../img/dashboard.jpg" alt="Card image"></center>
  <div class="card-img">
    <h1 class="card-title-overlay">Sample Admin Dashboard</h1>
    <br><hr><br>
    <p class="card-text">This is sample admin dashboard and we will enhance this after we finish developing the subsytem that is assigned to us. Upon the successful completion of the assigned subsystem, we will try to enhance the user experience and functionality of the dashboard, incorporating advanced features and an aesthetically refined design. Thank you mga ulol</p>
    
  </div>
</div>
</center>

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
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ -->
    Designed by <a  href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a>
  </div>
</div>
</footer>

<!-- End Footer -->
     
  </body>
</html>

<?php 
} else {
     header("Location: ../user/login.php");
     exit();
}
?>