<?php
define('TITLE', 'Update requester');
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
?>
<!-- Start 2nd column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Requester Details</h3>
    <?php
    if (isset($_REQUEST['edit'])) {
        $sql = "SELECT * FROM user WHERE r_login_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }

    if (isset($_REQUEST['update'])) {
        if (empty($_REQUEST['r_name']) || empty($_REQUEST['r_email'])) {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
        } else {
            $rid = $_REQUEST['r_login_id'];
            $rname = $_REQUEST['r_name'];
            $remail = $_REQUEST['r_email'];

            $sql = "UPDATE user SET r_name = '$rname', r_email = '$remail' WHERE r_login_id = '$rid'";
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
            <label for="r_login_id">Requester ID</label>
            <input type="text" class="form-control" name="r_login_id" id="r_login_id" value="<?php if (isset($row['r_login_id'])) {
                                                                                                    echo $row['r_login_id'];
                                                                                                } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="r_name">Name</label>
            <input type="text" class="form-control" name="r_name" id="r_name" value="<?php if (isset($row['r_name'])) {
                                                                                            echo $row['r_name'];
                                                                                        } ?>">
        </div>
        <div class="form-group">
            <label for="r_email">Email</label>
            <input type="email" class="form-control" name="r_email" id="r_email" value="<?php if (isset($row['r_email'])) {
                                                                                            echo $row['r_email'];
                                                                                        } ?>">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="update" name="update">Update</button>
            <a href="requester.php" class="btn btn-secondary">Close</a>
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