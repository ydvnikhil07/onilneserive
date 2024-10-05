<?php
define('TITLE', 'Technician');
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

?>

<!-- Start 2nd column -->
<div class="col-sm-5 mt-2 mx-3 jumbotron">
    <h3 class="text-center">Update Technician Details</h3>
    <?php
    if (isset($_REQUEST['edit'])) {
        $sql = "SELECT * FROM technician WHERE empid = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
        }
    }

    if (isset($_REQUEST['update'])) {
        if (empty($_REQUEST['empname']) || empty($_REQUEST['empcity']) || empty($_REQUEST['empmobile']) || empty($_REQUEST['empemail'])) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
        } else {
            $eid = $_REQUEST['empid'];
            $ename = $_REQUEST['empname'];
            $ecity = $_REQUEST['empcity'];
            $emobile = $_REQUEST['empmobile'];
            $eemail = $_REQUEST['empemail'];

            $sql = "UPDATE technician SET empname = '$ename', empcity = '$ecity', empmobile = '$emobile', empemail = '$eemail' WHERE empid = '$eid'";
            if ($conn->query($sql) === TRUE) {
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Record Updated Successfully</div>';
            } else {
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update Record</div>';
            }
        }
    }
    ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="empid">Technician ID</label>
            <input type="text" class="form-control" name="empid" id="empid" value="<?php if (isset($row['empid'])) echo $row['empid']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="empname">Name</label>
            <input type="text" class="form-control" name="empname" id="empname" value="<?php if (isset($row['empname'])) echo $row['empname']; ?>">
        </div>
        <div class="form-group">
            <label for="empcity">City</label>
            <input type="text" class="form-control" name="empcity" id="empcity" value="<?php if (isset($row['empcity'])) echo $row['empcity']; ?>">
        </div>
        <div class="form-group">
            <label for="empmobile">Mobile</label>
            <input type="text" class="form-control" name="empmobile" id="empmobile" value="<?php if (isset($row['empmobile'])) echo $row['empmobile']; ?>">
        </div>
        <div class="form-group">
            <label for="empemail">Email</label>
            <input type="email" class="form-control" name="empemail" id="empemail" value="<?php if (isset($row['empemail'])) echo $row['empemail']; ?>">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="update" name="update">Update</button>
            <a href="Technician.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
    <?php
    if (isset($msg)) {
        echo $msg;
    }
    ?>
</div>
<!-- End 2nd column -->
<?php
include('include/footer.php');
?>
