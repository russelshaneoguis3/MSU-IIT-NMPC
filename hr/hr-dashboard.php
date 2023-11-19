<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username']) && $_SESSION['role'] === 'HR') {
?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8">
  <meta content="Author" name="MSU-IIT Coop">
  <meta content="Keywords" name="MSU-IIT Coop, ,msuiit coop, msuiit cooperative, MSU-IIT Multi-purpose Cooperative, Cooperative in the Philippines, mindanao cooperative, philippine cooperative, coop natcco, coop" />
  <meta name="Description" content="MSU-IIT Coop, a leading, world-class cooperative serving the nation." />
  <title>MSU-IIT National Multi-Purpose Cooperative &raquo; Home</title>
  </head>
  <body>
<?php echo $_SESSION['name']; ?>▼</a></b>
                      <div id="myDropdown" class="dropdown-content">
                      <a href="../user/logout.php">Logout</a>
  
                      
                    </div>
        </header>
     
  </body>
</html>

<?php 
} else {
     header("Location: ../user/login.php");
     exit();
}
?>