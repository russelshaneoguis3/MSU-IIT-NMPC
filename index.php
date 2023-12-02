<?php 

session_start();

include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="Author" name="MSU-IIT Coop">
  <meta content="Keywords" name="MSU-IIT Coop, ,msuiit coop, msuiit cooperative, MSU-IIT Multi-purpose Cooperative, Cooperative in the Philippines, mindanao cooperative, philippine cooperative, coop natcco, coop" />
  <meta name="Description" content="MSU-IIT Coop, a leading, world-class cooperative serving the nation." />
  <title>MSU-IIT National Multi-Purpose Cooperative &raquo; Home</title>

  <!-- CSS Style -->
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="transition.css">

  <!-- FOnt style  -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap">

  <!-- Favicons -->
  <link href="img/coop-logo.png" rel="icon">
  <link href="img/coop-logo.png" rel="apple-touch-icon">

  <!-- Bootstrap Style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Your custom scripts -->
  <script src="transition.js"></script>

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />


</head>

<body>

<!-- page transition -->
<div id="transition-overlay">
    <img src="img/transition.jpg" alt="Loading Image">
</div>

<!-- ======= Top Bar ======= -->

<section id="topbar" class="d-flex align-items-center">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
      <i class="fa fa-phone d-flex align-items-center">&nbsp; (063) 223-5874</i>
      <i class="fa fa-envelope d-flex align-items-center ms-3">&nbsp; </i>
      <i class="fa-brands fa-twitter ms-2"></i>
      <i class="fa-brands fa-facebook-f ms-2"></i>
    </div>
    <div class="social-links d-none d-md-flex align-items-center">
      <a href="index.php" class="home"><i class="fa fa-home ms-2"></i> Home</a>
      <a href="user/career.php" class="career transition-link"><i class="fa fa-briefcase ms-2"></i> Careers</a>
      <a href="user/login.php" class="transition-link"><i class="fa fa-user ms-2"></i> Member's Portal</a>
    </div>
  </div>
</section>


<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="img/nmpc-logo.png" alt="" class="img-fluid"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-2">
        <li class="nav-item">
          <a class="nav-link transition-link" aria-current="page" href="index.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link transition-link" aria-current="page" href="index.php">Product & Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link transition-link" aria-current="page" href="index.php">Allied Businesses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link transition-link" aria-current="page" href="index.php">Membership</a>
        </li>
        <li class="nav-item">
          <a class="nav-link transition-link" aria-current="page" href="index.php">Branches</a>
        </li>

        <li class="nav-item" style="margin-right: 85px;">
          <a class="nav-link transition-link" aria-current="page" href="index.php">FAQs</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

        <!-- Dropdown magamit puhon -->

        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li> -->

          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<!-- ======= slideshow Section ======= -->
<section id="hero">
  <div class="hero-container">
    <div id="" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(img/slide.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>MSU-IIT NMPC</span></h2>
                <p class="animate__animated animate__fadeInUp">The MSU-IIT National Multi-Purpose Cooperative is a cooperative organization that serves the members of the Mindanao State University-Iligan Institute of Technology (MSU-IIT) community. It offers a wide range of services to its members, including savings and loans, insurance, housing and real estate, consumer goods and services, educational and training programs, and community development programs. The NMPC is committed to promoting the economic and social well-being of its members, and to the principles of cooperation, self-help, and self-reliance.</p>
                <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

      </div>

      <a class="carousel-control-prev" href="index.php" role="button" data-bs-slide="prev">
        <i class="bi bi-chevron-left" aria-hidden="true"></i>
      </a>

      <a class="carousel-control-next" href="index.php" role="button" data-bs-slide="next">
        <i class="bi bi-chevron-right" aria-hidden="true"></i>
      </a>

    </div>
  </div>
</section>
<!-- End Hero -->

<!-- SERVICES SECTION -->
<section id="services" class="services">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card">
          <div class="card-body">
            <span class="pe-7s-safe"></span>
            <h3 class="card-title">Savings</h3>
            <hr>
            <ul class="list-unstyled">
              <li><a href=""></a>• Share Capital</li>
              <li><a href=""></a>• Savings Deposit</li>
              <li><a href=""></a>• Time Deposit</li>
              <li><a href=""></a>• Youth Sector</li>
              <li><a href=""></a>• Laboratory Cooperative
                <ul>
                  <li><a href=""></a>Kiddie Savers</li>
                  <li><a href=""></a>Youth/Teen Savers</li>
                  <li><a href=""></a>Aflatoun</li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card">
          <div class="card-body">
            <span class="pe-7s-cash"></span>
            <h3 class="card-title">Cash &amp; Loans</h3>
            <hr>
            <ul class="list-unstyled">
            <li><a href=""></a>• Micro Loan</li>
                  <li><a href=""></a>• MSME Loan</li>
                  <li><a href=""></a>• Credit Line</li>
                  <li><a href=""></a>• Back-to-back Loan</li>
                  <li><a href=""></a>• Enhanced Petty Cash Loan</li>
                  <li><a href=""></a>• Personal Loan</li>
                  <li><a href=""></a>• Salary</li>
                  <li><a href=""></a>• Educational Loan</li>
                  <li><a href=""></a>• Pensioner's Loan</li>
                  <li><a href=""></a>• Medical Emergency Loan</li>
                  <li><a href=""></a>• Enhanced Car Financing Loan</li>
                  <li><a href=""></a>• Gadget and Appliance Loan</li>
                  <li><a href=""></a>• Bonus/Incentive Loan</li>
                  <li><a href=""></a>• LGU Salary Loan</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card">
          <div class="card-body">
            <span class="pe-7s-repeat"></span>
            <h3 class="card-title">Allied Businesses</h3>
            <hr>
            <ul class="list-unstyled">
            <li><a href=""></a>• MSU-IIT National Cooperative Academy</li>
                  <li><a href=""></a>• Insurances offered from CLIMBS</li>
                  <li><a href=""></a>• Housing Cooperative</li>
                  <li><a href=""></a>• Agri-Business</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card">
          <div class="card-body">
            <span class="pe-7s-user"></span>
            <h3 class="card-title">Member Benefits</h3>
            <hr>
            <ul class="list-unstyled">
            <li><a href=""></a>• Enhanced COOP Care</li>
                  <li><a href=""></a>• Sunshine (Damayan) Fund</li>
                  <li><a href=""></a>• YAKAP – Yaman sa Kalusugan Program</li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- End SERVICES SECTION -->
<br><br>

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
        Designed by <a target="_blank" href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>
  
<!-- End Footer -->

</body>

</html>