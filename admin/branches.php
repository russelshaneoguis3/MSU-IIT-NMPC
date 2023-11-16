<?php 
session_start();

include("../connection.php");

if (isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] === 'administrator') {

    if (isset($_GET['deleteBranch'])) {
        $deleteB = $_GET['deleteBranch'];
    
// Check if $deleteB is a valid integer (Delete Branch)
        if (filter_var($deleteB, FILTER_VALIDATE_INT)) {
            $deleteB_que = "DELETE FROM branch WHERE branch_id = $deleteB";
            $deleteB_que_result = mysqli_query($conn, $deleteB_que);
    
            if ($deleteB_que_result) {
                // Redirect to career-branch.php after deletion
                header("Location: branches.php");
                exit;
            } else {
                // Handle query execution error
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Handle invalid branch_id (not an integer)
            echo "Invalid branch ID";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the form
        $branchId = $_POST['branch_id'];
        $branchName = $_POST['branch_name'];
        $location = $_POST['location'];
        $mobileNo = $_POST['mobile_no'];
        $telNo = $_POST['tel_no'];
        $hrAssigned = $_POST['hr_assigned'];
    
        // Perform the update in the database branch table with prepared statement
        $updateQuery = "UPDATE branch SET
        branch_name = ?,
        location = ?,
        mobile_no = ?,
        tel_no = ?,
        hr_assigned = ?
        WHERE branch_id = ?";

        // Prepare the statement
        $stmt = mysqli_prepare($conn, $updateQuery);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssssi", $branchName, $location, $mobileNo, $telNo, $hrAssigned, $branchId);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
        // Script to show Bootstrap modal after successful update
        // Redirect to the same page after setting the session variable
        header("Location: branches.php?editSuccess=true");
        exit();
        } else {
        // Handle query execution error
        echo "Error updating branch: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);

    }
// Function to escape single quotes
function escapeSingleQuotes($string) {
    return str_replace("'", "\\'", $string);
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

    <!-- Style/CSS -->
    <link href="branches.css" rel="stylesheet">

      <!-- Style/CSS for transition -->
  <link rel="stylesheet" type="text/css" href="../transition.css">

<!-- Bootstrap Style -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- FOnt style  -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap">

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
<!-- sidebar -->

<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu" checked>
  <label for="openSidebarMenu" class="sidebarIconToggle" >
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
  </label>

  <div id="sidebarMenu">
    <ul class="sidebarMenuInner">
    <li><a class="transition-link"href="admin-dashboard.php">Home</a></li>
      <li><a href="">Product & Services</a></li>
      <li><a href="">Allied Business</a></li>
      <li><a href="">Membership</a></li>
      <li><a class="transition-link" href="branches.php">Branches</a></li>
      <li><a href="">Careers</a></li>
      <li><a href="">FAQs</a></li>
    </ul>
  </div>
            </header>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Branch List</h2>

            <ol>
                <li><a href="admin-dashboard.php">Home</a></li>
                <li>Branches</li>
            </ol>
        </div>
    </section>
    
    <!-- End Breadcrumbs -->


    <?php

        // Fetch data from the 'branch' area 1
            $query1 = "SELECT branch_id, CONCAT('<b>',branch_name,'</b>', '<br>', location) as branch, 

            branch_name, location, mobile_no, tel_no, hr_assigned,

            CONCAT('<b>','Tel no:  ','</b>', tel_no,'<br>','<b>','Mobile no:  ' , '</b>', mobile_no) as contact, name, 
            COUNT(job_id) AS job_count FROM user, branch LEFT JOIN job ON branch_loc = branch_id WHERE area = 1 AND id = hr_assigned GROUP BY branch_id";

            $result1 = mysqli_query($conn, $query1);

        // Fetch data from the 'branch' area 2 
            $query2 = "SELECT branch_id, CONCAT('<b>',branch_name,'</b>', '<br>', location) as branch, 

            branch_name, location, mobile_no, tel_no, hr_assigned,

            CONCAT('<b>','Tel no:  ','</b>', tel_no,'<br>','<b>','Mobile no:  ' , '</b>', mobile_no) as contact, name, 
            COUNT(job_id) AS job_count FROM user, branch LEFT JOIN job ON branch_loc = branch_id WHERE area = 2 AND id = hr_assigned GROUP BY branch_id";
    
            $result2 = mysqli_query($conn, $query2);


            // Fetch data from the 'branch' area 3
            $query3 = "SELECT branch_id, CONCAT('<b>',branch_name,'</b>', '<br>', location) as branch, 
    
            branch_name, location, mobile_no, tel_no, hr_assigned,
        
            CONCAT('<b>','Tel no:  ','</b>', tel_no,'<br>','<b>','Mobile no:  ' , '</b>', mobile_no) as contact, name, 
            COUNT(job_id) AS job_count FROM user, branch LEFT JOIN job ON branch_loc = branch_id WHERE area = 3 AND id = hr_assigned GROUP BY branch_id";
        
            $result3 = mysqli_query($conn, $query3);

        ?>

<!-- Table 1/ Area 1 -->
        <div class="card" style="max-width: 80rem;">
            <div class="card-header" style="background-color: #4775d1; color: #fff;">
            <h4> Area 1  <a href="add-branch.php" class="btn btn-success" style="float: right" onclick="showAddBranchModal()"> <i class="fa-solid fa-location-dot"></i> Add Branch</a></h4> 
            </div>
            <div class="card-body" style="background-color: #CFE2FF">
                <blockquote class="blockquote mb-4">
                    <table class="table table-bordered table-primary">
                        <thead>
                            <tr>
                                <th scope="col" class="col-md-4">Branches</th>
                                <th scope="col" class="col-md-3">Contact No.</th>
                                <th scope="col" class="col-md-2">HR Assigned</th>
                                <th scope="col" class="col-md-2">Available Jobs</th>
                                <th scope="col" class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Loop through the data and display each row in the table
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo '<tr>';
                            echo '<td>' . $row['branch'] . '</td>';
                            echo '<td>' . $row['contact'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>'; 
                            echo '<td>' .'<b>',$row['job_count'],'</b>', "  Available" . '</td>'; 
                            echo '<td>';
                            // Add an Edit button with a Bootstrap class
                            echo '<a href="#" class="btn btn-outline-primary" onclick="editBranch(' . $row['branch_id'] . ', \'' . escapeSingleQuotes($row['branch_name']) . '\', \'' . escapeSingleQuotes($row['location']) . '\', \'' . escapeSingleQuotes($row['mobile_no']) . '\', \'' . escapeSingleQuotes($row['tel_no']) . '\', \'' . escapeSingleQuotes($row['hr_assigned']) . '\')"><i class="fa-solid fa-pen-to-square"></i></a>';

                            // Add a Delete button with a Bootstrap class
                            echo ' <a href="#" class="btn btn-outline-danger" onclick="deleteBranch(' . $row['branch_id'] . ')"><i class="fa-solid fa-trash-can"></i></a>';

                            echo '</td>';    
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </blockquote>
            </div>
        </div>

<!-- Table 2 / Area 2 -->

<div class="card" style="max-width: 80rem;">
            <div class="card-header" style="background-color: #4775d1; color: #fff;">
            <h4> Area 2  <a href="add-branch.php" class="btn btn-success" style="float: right" onclick="showAddBranchModal()"> <i class="fa-solid fa-location-dot"></i> Add Branch</a></h4> 
            </div>
            <div class="card-body" style="background-color: #CFE2FF">
                <blockquote class="blockquote mb-4">
                    <table class="table table-bordered table-primary">
                        <thead>
                            <tr>
                                <th scope="col" class="col-md-4">Branches</th>
                                <th scope="col" class="col-md-3">Contact No.</th>
                                <th scope="col" class="col-md-2">HR Assigned</th>
                                <th scope="col" class="col-md-2">Available Jobs</th>
                                <th scope="col" class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Loop through the data and display each row in the table
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo '<tr>';
                            echo '<td>' . $row['branch'] . '</td>';
                            echo '<td>' . $row['contact'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>'; 
                            echo '<td>' .'<b>',$row['job_count'],'</b>', "  Available" . '</td>'; 
                            echo '<td>';
                            // Add an Edit button with a Bootstrap class
                            echo '<a href="#" class="btn btn-outline-primary" onclick="editBranch(' . $row['branch_id'] . ', \'' . $row['branch_name'] . '\', \'' . $row['location'] . '\', \'' . $row['mobile_no'] . '\', \'' . $row['tel_no'] . '\', \'' . $row['hr_assigned'] . '\')"><i class="fa-solid fa-pen-to-square"></i></a>';

                            // Add a Delete button with a Bootstrap class
                            echo ' <a href="#" class="btn btn-outline-danger" onclick="deleteBranch(' . $row['branch_id'] . ')"><i class="fa-solid fa-trash-can"></i></a>';

                            echo '</td>';    
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </blockquote>
            </div>
        </div>

<!-- Table 3 / Area 3 -->

<div class="card" style="max-width: 80rem;">
            <div class="card-header" style="background-color: #4775d1; color: #fff;">
            <h4> Area 3  <a href="add-branch.php" class="btn btn-success" style="float: right" onclick="showAddBranchModal()"> <i class="fa-solid fa-location-dot"></i> Add Branch</a></h4> 
            </div>
            <div class="card-body" style="background-color: #CFE2FF">
                <blockquote class="blockquote mb-4">
                    <table class="table table-bordered table-primary">
                        <thead>
                            <tr>
                                <th scope="col" class="col-md-4">Branches</th>
                                <th scope="col" class="col-md-3">Contact No.</th>
                                <th scope="col" class="col-md-2">HR Assigned</th>
                                <th scope="col" class="col-md-2">Available Jobs</th>
                                <th scope="col" class="col-md-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Loop through the data and display each row in the table
                        while ($row = mysqli_fetch_assoc($result3)) {
                            echo '<tr>';
                            echo '<td>' . $row['branch'] . '</td>';
                            echo '<td>' . $row['contact'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>'; 
                            echo '<td>' .'<b>',$row['job_count'],'</b>', "  Available" . '</td>'; 
                            echo '<td>';
                            // Add an Edit button with a Bootstrap class
                            echo '<a href="#" class="btn btn-outline-primary" onclick="editBranch(' . $row['branch_id'] . ', \'' . $row['branch_name'] . '\', \'' . $row['location'] . '\', \'' . $row['mobile_no'] . '\', \'' . $row['tel_no'] . '\', \'' . $row['hr_assigned'] . '\')"><i class="fa-solid fa-pen-to-square"></i></a>';

                            // Add a Delete button with a Bootstrap class
                            echo ' <a href="#" class="btn btn-outline-danger" onclick="deleteBranch(' . $row['branch_id'] . ')"><i class="fa-solid fa-trash-can"></i></a>';

                            echo '</td>';    
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </blockquote>
            </div>
        </div>


<!-- Update/Edit Branch Modal -->
<div id="editBranchModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style= "background-color: #66ccff; color: #fff;">
                <h5 class="modal-title">Edit Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" style="background-color: #f5f5ef;">
                <!-- Form for Editing Branch -->
                <form action="" method="post">
                    <input type="hidden" id="editBranchId" name="branch_id">
                    <div class="form-group">
                        <label for="editBranchName"><b>Branch Name</b></label>
                        <input type="text" class="form-control" id="editBranchName" name="branch_name" required>
                    </div><br>
                    <div class="form-group">
                        <label for="editLocation"><b>Location</b></label>
                        <input type="text" class="form-control" id="editLocation" name="location" required>
                    </div><br>
                    <div class="form-group">
                        <label for="editTelNo"><b>Telephone Number </b>(separate with ' ; ' if multiple)</label>
                        <input type="text" class="form-control" id="editTelNo" name="tel_no" required>
                    </div><br>
                    <div class="form-group">
                        <label for="editMobileNo"><b>Mobile Number</b> (separate with ' ; ' if multiple)</label>
                        <input type="text" class="form-control" id="editMobileNo" name="mobile_no" required>
                    </div><br>
                    <div class="form-group">
                        <label for="editHrAssigned"><b>HR Assigned</b> (HR ID)</label>
                        <input type="text" class="form-control" id="editHrAssigned" name="hr_assigned" required>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div> 

<!-- Edit Success Modal -->
<div id="editBranchSuccessModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #66ccff; color: #fff;">
                <h5 class="modal-title">Update Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #f5f5ef;">
                <p>The branch information has been updated successfully.</p>
            </div>
        </div>
    </div>
</div>

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

<script>
    function deleteBranch(branchId) {
        // Trigger SweetAlert confirmation
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this branch!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, redirect to deleteBranch URL
                window.location.href = "branches.php?deleteBranch=" + branchId;
            }
        });
    }

</script>

<script>
    function editBranch(branchId, branchName, location, mobileNo, telNo, hrAssigned) {
        console.log(branchId, branchName, location, mobileNo, telNo, hrAssigned);

        // Set values in the modal form
        document.getElementById('editBranchId').value = branchId;
        document.getElementById('editBranchName').value = branchName;
        document.getElementById('editLocation').value = location;
        document.getElementById('editMobileNo').value = mobileNo;
        document.getElementById('editTelNo').value = telNo;
        document.getElementById('editHrAssigned').value = hrAssigned;

        // Show the modal
        $('#editBranchModal').modal('show');
    }
    
</script>

</body>

    <?php 
    } else {
        header("Location: ../user/login.php");
        exit();
    }
    ?>
</html>

<?php

// Check if the editSuccess parameter is present in the URL
if (isset($_GET['editSuccess']) && $_GET['editSuccess'] === 'true') {
    echo '<script>
        $(document).ready(function(){
            $("#editBranchSuccessModal").modal("show");
        });
    </script>';
}
?>