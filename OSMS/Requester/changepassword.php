<?php
define('TITLE', 'Change password');
define('PAGE', 'Change password');
include('include/header.php');
include('../dbcon.php');
session_start();

if ($_SESSION['is_login']) {
    $remail = $_SESSION['remail'];
} else {
    echo "<script>location.href='login.php'</script>";
}
$remail = $_SESSION['remail'];
if (isset($_REQUEST['passupdate'])) {
    if ($_REQUEST['rpassword'] == "") {
        $passmsg = '<div class="alert alert-warning col-sm-6 mt-2">Fill All Fialds </div>';
    } else {

        $rpassword = $_POST['rpassword'];
        $sql = "UPDATE user SET r_password='$rpassword' WHERE r_email='$remail'";
        if (mysqli_query($conn, $sql) == true) {
            $passmsg = "<div class='alert alert-success mt-2'>Password updated successfully</div>";
        } else {
            $passmsg = "<div class='alert alert-danger mt-2'>Unable to update Password</div>";
        }
    }
}

?>
<div class="col-sm-9 col-md-5 mt-5">
    <form action="" method="post">
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" value="<?php echo $remail ?>" readonly>
        </div>
        <div class="form-group">
            <label for="inputnewpassword">New Password</label>
            <input type="password" class="form-control" id="inputnewpassword" placeholder="New password" name="rpassword">
        </div>
        <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
        <button type="reset" class="btn btn-secondary mt-4">Reset</button>

        <?php if (isset($passmsg)) {
            echo $passmsg;
        } ?>
    </form>
</div>


<?php
include('include/footer.php');
?>