<?php
define('TITLE', 'Add requester');
define('PAGE', 'requester');
include('include/header.php');
include('../dbcon.php');

session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aemail = $_SESSION['aemail'];
} else {
    echo "<script>location.href='login.php'</script>";
    exit;
}
if (isset($_REQUEST['reqsubmit'])) {
    if (($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "") || ($_REQUEST['r_password'] == "")) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fileds</div>';
    } else {
        $rname = $_REQUEST['r_name'];
        $remail = $_REQUEST['r_email'];
        $rpassword = $_REQUEST['r_password'];
        $sql = "INSERT INTO user (r_name , r_email, r_password)VALUES('$rname','$remail','$rpassword')";
        if ($conn->query($sql) == true) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Added Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Add</div>';
        }
    }
}
?>
<!--start 2nd column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Requester</h3>
    <form action="" method="post">
        <div class="form-group">
            <label for="r_name">Name</label>
            <input type="text" class="form-control" id="r_name" name="r_name">
        </div>
        <div class="form-group">
            <label for="r_email">Email</label>
            <input type="email" class="form-control" id="r_email" name="r_email">
        </div>
        <div class="form-group">
            <label for="r_email">Password</label>
            <input type="password" class="form-control" id="r_password" name="r_password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="reqsubmit" name="reqsubmit">Submit</button>
            <a href="requester.php">Close</a>
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
    </form>
</div>
<!--End 2nd column -->
<?php
include('include/footer.php');
?>