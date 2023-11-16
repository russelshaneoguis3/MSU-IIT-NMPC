<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- login fill username -->
<?php
        if(isset($_SESSION['fill']) && $_SESSION['fill'] !='')
        {
?>
        <script>
            swal({
            title: "<?php echo $_SESSION['fill'];?>",
            text: "Don't leave anything blank",
            icon: "warning",
            button: "Ok",
            });
</script>
<?php
    unset($_SESSION['fill']);
        }
?>

<!-- login fill password -->
<?php
        if(isset($_SESSION['fillpass']) && $_SESSION['fillpass'] !='')
        {
?>
        <script>
            swal({
            title: "<?php echo $_SESSION['fillpass'];?>",
            text: "Don't leave anything blank",
            icon: "warning",
            button: "Ok",
            });
</script>
<?php
    unset($_SESSION['fillpass']);
        }
?>

<!-- Wrong Credentials Error(login) -->
<?php
        if(isset($_SESSION['wrongC']) && $_SESSION['wrongC'] !='')
        {
?>
        <script>
            swal({
            title: "<?php echo $_SESSION['wrongC'];?>",
            text: "Fill correct username & password",
            icon: "error",
            button: "Ok",
            });
</script>
<?php
    unset($_SESSION['wrongC']);
        }
?>