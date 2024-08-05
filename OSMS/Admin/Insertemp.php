<?php
define('TITLE', 'Update Technician');
define('PAGE', 'technician');
include('include/header.php');
include('../dbcon.php');

session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aemail = $_SESSION['aemail'];
} else {
    echo "<script>location.href='login.php'</script>";
    exit;
}

if (isset($_REQUEST['empsubmit'])) {
    if (empty($_REQUEST['empname']) || empty($_REQUEST['empcity']) || empty($_REQUEST['empmobile']) || empty($_REQUEST['empemail'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $ename = $_REQUEST['empname'];
        $ecity = $_REQUEST['empcity'];
        $emobile = $_REQUEST['empmobile'];
        $eemail = $_REQUEST['empemail'];

        $sql = "INSERT INTO technician (empname, empcity, empmobile, empemail) VALUES ('$ename', '$ecity', '$emobile', '$eemail')";
        if ($conn->query($sql) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Added Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Add</div>';
        }
    }
}
?>

<!--start 2nd column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Technician</h3>
    <form action="" method="post">
        <div class="form-group">
            <label for="empname">Name</label>
            <input type="text" class="form-control" id="empname" name="empname">
        </div>
        <div class="form-group">
            <label for="empcity">City</label>
            <input type="text" class="form-control" id="empcity" name="empcity">
        </div>
        <div class="form-group">
            <label for="empmobile">Mobile</label>
            <input type="text" class="form-control" id="empmobile" maxlength="10" name="empmobile">
        </div>
        <div class="form-group">
            <label for="empemail">Email</label>
            <input type="email" class="form-control" id="empemail" name="empemail">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="empsubmit" name="empsubmit">Submit</button>
            <a href="Technician.php" class="btn btn-secondary">Close</a>
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
